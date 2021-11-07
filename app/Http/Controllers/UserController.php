<?php
namespace App\Http\Controllers;

use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Helpers\AppHelper;
use App\Institute;
use App\Role;
use App\User;
use App\Faculty;
use App\Lecturer;
use App\Mail\AccountCreation;
use App\Mail\InvoiceMail;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Session;
use Validator;

class UserController extends Controller {

	public function __construct()
	{
		//$this->middleware('admin', ['except' => ['login', 'logout','settings','postSettings']]);
		$this->middleware('auth');
	}
	/**
	* Make Login
	*
	* @return Response
	*/
	public function login()
	{
		return view('dashboard');
		
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/login')->with('success', 'Your are now logged out!');
	}

	/**
	* Show all user.
	*
	* @return Response
	*/
	public function index()
	{
		$users=User::all();
        $allRoles=Role::all();
        return view('user.index',compact(['users','allRoles']));
	}
	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function create()
	{
		$faculties = Faculty::where('status',1)->get();
		$dept = Department::all();
		$roles = Role::all();
		return view('user.create', compact('faculties', 'roles','dept'));
	}


	/**
	* Store a newly created resource in storage.
	*
	* @return Response
	*/
	public function store(Request $request)
	{
	    try{
	       // return $request;
    		$this->validate($request,[
    			'name' => 'required|max:255',
    			'title' => 'required',
    			'email' => 'email|required',
    			'password' => 'required|confirmed|min:6'
    		]);
    		$data = array();
    		$data=$request->all();
			
			$check = User::where(['email' => $data['email']])->count();
			if($check > 0){
				return back()->with('error', 'User Already Exist');
			}

    		$user= User::create([
                'name' => $data['name'],
                'title' => $data['title'],
                'email' => $data['email'],
    			'password' => bcrypt($data['password']),
    			'password_raw' => $data['password'],
    			'status' => $data['status'],
    		 	'faculty_id' => $data['faculty_id'], 
           'dept_id' => $data['dept_id'], 
            ]);
			// $role = Role::create;
			$role = Role::where('id',$data['role_id'])->first();
            $user->attachRole($role);
			if($role->name == 'lecturer'){
				Lecturer::create([
					'user_id' => $user->id
				]);
			}
			
			$notification= array('title' => 'Data Store', 'body' => 'User Created Succesfully.');

			Mail::to(urldecode($data['email']))->send(new AccountCreation($data));

			return back()->with("success",'User Created Succesfully');
	    }catch(\Throwable $th){
			return back()->with('error',$th->getMessage());
	    }
	}
	
	public function edit($id){
	    $faculties = Faculty::where('status',1)->get();
		$dept = Department::all();
	    $user = User::find($id);
	    return view('user.edit', compact('user','faculties','dept'));
	}
	
	public function update(Request $request, $id)
    {
        $user=User::find($id);
        
        User::where('id', $id)->update([
           'name' => $request->name, 
           'title' => $request->title, 
           'email' => $request->email, 
           'faculty_id' => $request->faculty_id, 
           'dept_id' => $request->dept_id, 
           'password' => bcrypt($request->password), 
           'password_raw' => $request->password, 
           'status' => $request->status, 
        ]);
        toastr()->success('User updated successfully...', 'Success');
        return redirect()->route('user.index');
    }
    
    public function role_update(Request $request, $id){
        try{
            // return $id;
            $user=User::find($id);
            $roles=$request->roles;
            DB::table('role_user')->where('user_id',$id)->delete();
            foreach ($roles as $role){
                $user->attachRole($role);
				$userRole = Role::where('id',$role)->first();

				if($userRole->name == 'lecturer'){
					$previouseLecturer = Lecturer::where('user_id', $id)->first();
					if(!$previouseLecturer){
						Lecturer::create([
							'user_id' => $id
						]);
					}
				}
            }
            toastr()->success('Roles added successfully...','Success');
            return redirect()->back();
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }

	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function destroy($id)
	{
		$user = User::findOrFail($id);
		$user->delete();
		$notification= array('title' => 'Data Delete', 'body' => 'User Deleted Succesfully.');
		return Redirect::route('user.index')->with("success",$notification);
	}

	/**
	* Change the specified user informations.
	*
	*@return Response
	*/
	public function settings()
	{
		$user = Auth::user();
		return view('user.settings',compact('user'));
	}

	public function postSettings(Request $request)
	{
		$request->validate([
			'password' => 'required|same:password_confirmation|different:oldpassword'
		]);
		if($request->oldpassword == $request->password){
			toastr()->warning('Choose a new password','Warning!');
			return redirect()->back();
		}
		$user_id = auth()->user()->id;
		User::where('id',$user_id)->update([
			'password' => bcrypt($request['password']),
			'password_raw' => $request['password']
		]);
		toastr()->success('Password Updated Successfully','Success');
		return redirect()->back();
	}


}
