<?php
namespace App\Http\Controllers;

use App\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller 
{
    public function index()
    {
        return view();
    }

    public function general_settings(Request $request){
        $isEnabled = Auth::getUser()->loginSecurity;
        $settings = GeneralSettings::first();
        // dd($settings);
        if($request->isMethod('post')){
            if($settings == null){
                GeneralSettings::create($request->all()); 
            }else{
                $settings->update($request->all());
            }
           
            return back()->with('success', 'Settings saved');
        }
        return view('general_settings', compact('settings', 'isEnabled'));
    }
}