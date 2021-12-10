<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\ArticleImage;
use App\Models\Article;
use App\Models\Keyword;
use App\Models\Category;
use App\Events\ArticleHit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Models\Image as ModelsImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;


class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::published()
        ->latest()
        ->notDeleted()
        ->orderby('articles.id', 'DESC')->paginate(10);
        // dd($articles);
        return view("frontend.articles.index", compact('articles'));
    }

    public function show($articleId, $articleHeading = '')
    {
        $article = Article::where('id', $articleId)
            // ->published()
            // ->notDeleted()
            ->with(['user', 'category', 'keywords',])
            ->first();

            $articles = Article::published()
            ->latest()
            ->notDeleted()
            ->orderby('articles.id', 'DESC')->paginate(6);

        if (is_null($article)) {
            return view('/')->with('warningMsg', 'Article not found');
        }

        //$clientIP = $_SERVER['REMOTE_ADDR'] ?? '';
        //event(new ArticleHit($article, $clientIP));

        $article->isEditable = $this->isEditable($article);

        $relatedArticles = $this->getRelatedArticles($article);

        return view("frontend.articles.show", compact('article', 'relatedArticles','articles'));
    }

    private function isEditable(Article $article)
    {
        if (!auth()->check()) {
            return false;
        }
        $isAdmin = auth()->user()->hasRole(['owner', 'admin']);
        $isAuthor = $article->user->id == auth()->user()->id;
        return auth()->check() && ($isAdmin || $isAuthor);
    }

    private function getRelatedArticles(Article $article)
    {
        return Article::where('category_id', $article->category->id)
            ->where('id', '!=', $article->id)
            ->published()
            ->latest()
            ->take(3)
            ->get();
    }

    public function edit($articleId)
    {
        $article = Article::find($articleId);
        // dd($article);

        if (is_null($article)) {
            return redirect()->route('home')->with('errorMsg', 'Article not found');
        }

        $keywords = implode(', ', $article->keywords->pluck('name')->toArray());
        $article = json_decode(json_encode($article));
        $article->keywords = $keywords;

        $article_image = ArticleImage::where('article_id', $articleId)->first();
        
        if (!is_null($article_image)) {
            $image = ModelsImage::where('id', $article_image->image_id)->first();
        }

        $article->image = $image->src;

        $categories = Category::active()->get();
        return view('backend.article_edit', compact('categories', 'article'));
    }

    public function update_old(Request $request, $articleId)
    {
        $article = Article::find($articleId);
        if (is_null($article)) {
            return redirect()->route('admin-articles')->with('error', 'Article not found');
        }

        $updatedArticle = [
            'heading' => $request->heading,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'type' => $request->type,
            'is_comment_enabled' => (bool) $request->is_comment_enabled,
            'is_page' => (bool) $request->is_page
        ];

        // dd($updatedArticle);
        
        $keywordsToAttach = array_unique(explode(' ', $request->get('keywords')));
        try {
            $article->update($updatedArticle);
            //remove all keywords then add all keywords from input

            

            if ($request->hasFile('article_image')) {
                $article_image = ArticleImage::where('article_id', $article->id);
                // dd($article_image);

                $image_model = ModelsImage::find($article_image->image_id);

                if (!$request->file('article_image')->isValid()) {

                    return redirect()->back()->with('error', 'image not valid');
                }

                $file = $request->file('article_image');

                // Get filename with extension
                $filenameWithExt = $file->getClientOriginalName();

                // Get file path
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

                // Remove unwanted characters
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);

                // Get the original image extension
                $extension = $file->getClientOriginalExtension();

                // Create unique file name
                $fileNameToStore = Str::lower($filename . '_' . time() . '.' . $extension);

                $destinationPath = base_path('/uploads/images/articles/');

                $file->move($destinationPath, $fileNameToStore);

                $this->resizeImage($destinationPath . $fileNameToStore);

                $image_model->src = $fileNameToStore;
                $image_model->save();
            }

            $article->keywords()->detach();
            foreach ($keywordsToAttach as $keywordToAttach) {
                $newKeyword = Keyword::firstOrCreate(['name' => $keywordToAttach]);
                $article->keywords()->attach($newKeyword->id);
            }
            return back()->with('success', 'Article updated successfully!');
        } catch (\PDOException $e) {
            Log::error($e->getMessage());
            return back()->with('error', $e->getMessage());
        }


    }

    public function create()
    {
        $categories = Category::where('is_active', 1)->get();
        return view('backend.article_create', compact('categories'));
    }

  
    public function store(Request $request){

        $this->validate($request,[
            "heading" => "required",
            "category_id" => "required",
            "content" => "required",
            "keywords" => "required",
            "seo_description" => "required",
            "is_comment_enabled" => "nullable",
            "is_page" => "nullable",
            // 'article_image' => 'required',
        ]);
      
        $newArticle = [
            'heading' => $request->heading,
            'content' => $request->editor1,
            'category_id' => $request->category_id,
            'type' => $request->type,
            'is_comment_enabled' => (bool) $request->is_comment_enabled
        ];

        // dd($request);

        try {
            //code...

            if($request->hasFile('article_image')){
                $image = $request->file('article_image');
                $file = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('uploads/images/articles/');
                $imgFile = Image::make($image->getRealPath());
                $imgFile->resize(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$file);
                $destinationPath = public_path('uploads/images/articles/');
                $image->move($destinationPath, $file);
            }else{
                $file = null;
            }

            //Create new article
            $newArticle = new Article();
            $newArticle->heading = $request->heading;
            $newArticle->content =  $request->content;
            $newArticle->type =  $request->type;
            $newArticle->start_date =  $request->start_date;
            $newArticle->end_date =  $request->end_date;
            $newArticle->time =  $request->time;
            $newArticle->image =  $file;
            $newArticle->category_id =  $request->category_id;
            $newArticle->is_comment_enabled =  (bool) $request->is_comment_enabled;
            $newArticle->published_at = new \DateTime();
            $newArticle->user_id = Auth::user()->id;
            $newArticle->is_page = (bool) $request->is_page;
            $newArticle->save();

            //add keywords
            $keywordsToAttach = array_unique(explode(',', $request->keywords));
            foreach ($keywordsToAttach as $keywordToAttach) {
                $newKeyword = Keyword::firstOrCreate(['name' => trim($keywordToAttach)]);
                $newArticle->keywords()->attach($newKeyword->id);
            }

        } catch (\PDOException $e) {
            Log::error($e->getMessage());
            return response()->json(['errorMsg' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        // session()->flash('successMsg', 'Article published successfully!');
        return redirect()->route('admin-articles')->with('success','Article published successfully!');

    }

    public function update(Request $request,$id){

        // dd($request->all());
        
        $this->validate($request,[
            "heading" => "required",
            "category_id" => "required",
            "content" => "required",
            "type" => "required",
            "keywords" => "required",
            "seo_description" => "nullable",
            "is_comment_enabled" => "nullable",
            "is_page" => "nullable",
            // 'article_image' => 'required',
        ]);
      
       
        try {
            //code...

            // ARTICLE IMAGE
            $newArticle =  Article::find($id);

            if($request->hasFile('article_image')){
                $image = $request->file('article_image');
                $file = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('uploads/images/articles/');
                $imgFile = Image::make($image->getRealPath());
                $imgFile->resize(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$file);
                $destinationPath = public_path('uploads/images/articles/');
                $image->move($destinationPath, $file);
                $newArticle->image =  $file;
            }

            
            $newArticle->heading = $request->heading;
            $newArticle->content =  $request->content;
            $newArticle->start_date =  $request->start_date;
            $newArticle->end_date =  $request->end_date;
            $newArticle->time =  $request->time;
            $newArticle->type =  $request->type;
            $newArticle->category_id =  $request->category_id;
            $newArticle->is_comment_enabled =  (bool) $request->is_comment_enabled;
            $newArticle->is_page = (bool) $request->is_page;
            $newArticle->save();

            //add keywords
            $keywordsToAttach = array_unique(explode(',', $request->keywords));
            foreach ($keywordsToAttach as $keywordToAttach) {
                $newKeyword = Keyword::firstOrCreate(['name' => trim($keywordToAttach)]);
                $newArticle->keywords()->attach($newKeyword->id);
            }

        } catch (\PDOException $e) {
            Log::error($e->getMessage());
            return response()->json(['errorMsg' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        // session()->flash('successMsg', 'Article published successfully!');
        return redirect()->route('admin-articles')->with('success','Article published successfully!');

    }
    public function togglePublish($articleId)
    {
        $article = Article::find($articleId);
        if (is_null($article)) {
            return redirect()->route('home')->with('errorMsg', 'Article not found');
        }

        if ($this->hasArticleAuthorization(Auth::user(), $article)) {
            return redirect()->route('home')->with('errorMsg', 'Unauthorized request');
        }
        try {
            $article->update(
                [
                    'is_published' => !$article->is_published,
                    'published_at' => new \DateTime(),
                ]
            );
        } catch (\PDOException $e) {
            Log::error($this->getLogMsg($e));
            return redirect()->back()->with('errorMsg', $this->getMessage($e));
        }
        return redirect()->route('admin-articles')->with('successMsg', 'Article updated');
    }

    public function search(Request $request)
    {
        $this->validate($request, ['query_string' => 'required']);

        $queryString = $request->get('query_string');

        $articles = Article::published()
            ->notDeleted()
            ->where('heading', 'LIKE', "%$queryString%")
            ->orWhere('content', 'LIKE', "%$queryString%")
            ->orWhereHas('keywords', function (Builder $keywords) use ($queryString) {
                return $keywords->where('name', 'LIKE', "%$queryString%")
                    ->where('is_active', 1);
            })
            ->with('category', 'keywords', 'user')
            ->latest()
            ->paginate(config('blog.item_per_page'));

        $articles->setPath(url("search/?query_string=$queryString"));

        $searched = new \stdClass();
        $searched->articles = $articles;
        $searched->query = $queryString;

        return view("frontend.articles.search_result", compact('searched'));
    }

    public function adminArticles()
    {
        $articles = Article::notDeleted()
            ->with('category', 'keywords', 'user')
            ->latest();

        if (Auth::user()->hasRole(['author'])) {
            $articles = $articles->where('user_id', Auth::user()->id);
        }

        if (request()->filled('category')) {
            $articles = $articles->where('category_id', request('category'));
        }

        $articles = $articles->paginate(config('blog.item_per_page'));

        return view('backend.articleList', compact('articles'));
    }

    public function destroy($articleId)
    {
        $article = Article::find($articleId);
        if (is_null($article)) {
            return redirect()->route('home')->with('errorMsg', 'Article not found');
        }

        if ($this->hasArticleAuthorization(Auth::user(), $article)) {
            return redirect()->route('home')->with('errorMsg', 'Unauthorized request');
        }
        try {
            Article::where('id', $articleId)->update(['is_deleted' => 1]);
        } catch (\PDOException $e) {
            Log::error($this->getLogMsg($e));
            return redirect()->back()->with('errorMsg', $this->getMessage($e));
        }
        return redirect()->route('admin-articles')->with('successMsg', 'Article deleted');
    }

    private function hasArticleAuthorization($user, $article)
    {
        return $user->hasRole(['author']) && $article->user_id != $user->id;
    }

    /**
     * Resizes a image using the InterventionImage package.
     *
     * @param object $file
     * @param string $fileNameToStore
     * @author Niklas Fandrich
     * @return bool
     */
    private function resizeImage($file)
    {
        // $manager = new ImageManager(array('driver' => 'imagick'));

        // to finally create image instances
        $image = Image::make($file)->orientate()->resize(800, null)->save();

        if ($image) {
            return true;
        }
        return false;
    }
}
