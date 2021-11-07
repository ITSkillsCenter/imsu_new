<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AuditController extends Controller
{
    public function index(){
        $audits = DB::table('audits')
                    ->join('users','audits.user_id','=','users.id')
                    ->select('audits.event','audits.auditable_type','audits.old_values','audits.new_values','audits.created_at','audits.updated_at','users.name')
                    ->latest()
                    ->get();
        return view('audits.index', compact('audits'));
    }
}
