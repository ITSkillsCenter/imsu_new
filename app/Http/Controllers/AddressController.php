<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AddressController extends Controller
{
    public function addressByDivision ($id)
    {
        $subjects = DB::table('districts')->where('division_id', $id)->orderBy('id','asc')->get();
        //echo json_encode($subjects);
       return response(['subjects'=>$subjects]); 
 
    }

    public function addressByDistrict ($id)
    {
        $subjects = DB::table('upazilas')->where('district_id', $id)->orderBy('id','asc')->get();
        //echo json_encode($subjects);
       return response(['subjects'=>$subjects]); 
 
    }
    public function addressByUpazila ($id)
    {
        $subjects = DB::table('unions')->where('upazilla_id', $id)->orderBy('id','asc')->get();
        //echo json_encode($subjects);
       return response(['subjects'=>$subjects]); 
 
    }
}
