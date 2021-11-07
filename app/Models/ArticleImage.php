<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    protected $table = 'article_image';

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
