<?php
namespace App\Http\Controllers;

use App\FeeHistory;
use App\FeeList;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller {

	/**
	* Display a listing of the resource.
	*
	* @return Response
	*/
	public function index()
	{
//$permission = Permission::create(['name' => 'edit articles']);
		return view('dashboard');
	}


}
