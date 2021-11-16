<?php

namespace App\Http\Controllers;

use App\Country;
use App\Department;
use App\Faculty;
use App\FeeList;
use App\Helper\Helper;
use App\Mail\VerifyEmail;
use App\Mail\VerifyPgEmail;
use App\Pgapplicant;
use App\PgApplicationFee;
use App\State;
use App\StudentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PgController extends Controller
{
    public function pg_application(Request $request){
		if ($request->isMethod('post')) {
            // dd($request->all());
			try {

				$password = $request->the_password;
				if ($password !== $request->cnf_password) {
					return back()->with('error', 'Password mismatch!');
				}
				$check = Pgapplicant::where('email', $request->email)->first();
				if ($check) {
					$new_dataA['email'] = $request->email;
					Mail::to(strtolower($request->email))->send(new VerifyPgEmail($new_dataA));
					return back()->with('error', 'Email is already Registered, another verification link has been sent, kindly check your email');
				}
				
                $request->merge([
                    'password' => Hash::make($request->the_password)
                ]);

                Pgapplicant::create($request->all());

				$new_data['email'] = $request->email;
				Mail::to(strtolower($request->email))->send(new VerifyPgEmail($new_data));
				return back()->with('success', 'An email verification link has been sent to your email, please click the link to verify your email before continuing on this portal. If you don\'t see the verification mail in your inbox, check your spam mail / promotions folder and mark it as "Not Spam" before clicking to verify');

			} catch (\Exception $e) {
				return back()->with('error', 'An error occured, contact support');
			}
		}
		// $faculties = Faculty::all();
		// $states = State::all();
		return view('homepage.pg_registration');
	}

    public function verify(Request $request, $email){
        $email_address = base64_decode($email);
		$email = Pgapplicant::where(['email' => $email_address])->first();
		if (is_null($email)) {
			$error = 1;
			return view('homepage.verified', compact('error'));
		}
        if($email->application_number == null){
            $count = Pgapplicant::all()->count();
            $email->application_number = 'SPGS/IMSU/2021/'. str_pad($count, 5, "0", STR_PAD_LEFT );
        }
        
		$email->status = 'verified';
		$email->save();
		Session::put('pgapplicant', $email);

        return view('homepage.pg_verified', compact('email_address', 'email'));
    }

    public function application_fee(Request $request)
	{
		$applicant = Session::get('pgapplicant');
		if ($applicant == null) {
			return redirect('/post-graduate-application');
		}
		$std = Pgapplicant::where(['email' => $applicant->email])->first();
		$fee = FeeList::where(['fee_name' => 'IMSU - PG APPLICATION FORM'])->first();
		$check = PgApplicationFee::where(['email' => $applicant->email, 'status' => 'PAID'])->first();
		if ($check == null) {
			return redirect('/pg-application-fee')->with('error', 'Pay application fee');
		}
		return view('homepage.pg_application_fee', compact('fee', 'std'));
	}

    public function application_step3(Request $request){
        $applicant = Session::get('pgapplicant');
        $check = PgApplicationFee::where(['application_number' => $applicant->application_number, 'status' => 'PAID'])->first();
        $check = PgApplicationFee::where(['email' => $applicant->email, 'status' => 'PAID'])->first();
		if ($check == null) {
			return redirect('/pg-application-fee')->with('error', 'Pay application fee');
		}
		if ($request->isMethod('post')) {
            $request->merge(['step' => 3]);
			$save = PgApplicant::where(['application_number' => $applicant->application_number])->update($request->except(['_token', 'phone_number', 'date_of_birth', 'home_town']));
			// dd($save);
            return redirect('/pg-application-step4');
		}
		
        $std = Pgapplicant::where(['application_number' => $applicant->application_number])->first();
		$departments = Department::all();
		$states = State::all();
        $faculties = Faculty::all();
		$countries = Country::all();

        return view('homepage.personal_details', compact('std', 'check', 'departments', 'states','countries', 'faculties'));
    }

    public function application_step4(Request $request){
        $applicant = Session::get('pgapplicant');
        $std = Pgapplicant::find($applicant->id);
        $check = PgApplicationFee::where(['email' => $applicant->email, 'status' => 'PAID'])->first();
		if ($check == null) {
			return redirect('/pg-application-fee')->with('error', 'Pay application fee');
		}
		if ($request->isMethod('post')) {
            $request->merge([
                'previous_education' => json_encode($request->prevedu),
                'olevel' => json_encode($request->olevel),
                'step' => 4
            ]);
			$save = PgApplicant::where(['application_number' => $applicant->application_number])->update($request->except(['_token', 'prevedu']));
			// dd($save);
            return redirect('/pg-application-step5');
		}
		

        return view('homepage.pg_olevel', compact('std'));
    }

    public function application_step5(Request $request){
        $applicant = Session::get('pgapplicant');
        $std = Pgapplicant::find($applicant->id);
        $check = PgApplicationFee::where(['email' => $applicant->email, 'status' => 'PAID'])->first();
		if ($check == null) {
			return redirect('/pg-application-fee')->with('error', 'Pay application fee');
		}
		if ($request->isMethod('post')) {
            $request->merge([
                'step' => 5,
                'employment' => json_encode($request->prevemp),
            ]);
			$save = PgApplicant::where(['application_number' => $applicant->application_number])->update($request->except(['_token', 'prevemp']));
            return redirect('/pg-application-step6');
		}
		

        return view('homepage.pg_employment', compact('std'));
    }

    public function application_step6(Request $request){
        $applicant = Session::get('pgapplicant');
        $std = Pgapplicant::find($applicant->id);
        $check = PgApplicationFee::where(['email' => $applicant->email, 'status' => 'PAID'])->first();
		if ($check == null) {
			return redirect('/pg-application-fee')->with('error', 'Pay application fee');
		}
		if ($request->isMethod('post')) {
            $request->merge([
                'step' => 6,
                'next_of_kin' => json_encode($request->nok),
            ]);
			$save = PgApplicant::where(['application_number' => $applicant->application_number])->update($request->except(['_token', 'nok']));
            // dd($save);
            return redirect('/pg-application-step7');
		}
		

        return view('homepage.pg_reference', compact('std'));
    }

    public function application_step7(Request $request){
        $applicant = Session::get('pgapplicant');
        $std = Pgapplicant::find($applicant->id);
        $check = PgApplicationFee::where(['email' => $applicant->email, 'status' => 'PAID'])->first();
		if ($check == null) {
			return redirect('/pg-application-fee')->with('error', 'Pay application fee');
		}
		if ($request->isMethod('post')) {

            if ($request->hasFile('olevelres')) {
                if (!$request->file('olevelres')->isValid()) {
                    return redirect()->back()->with('error', 'File not valid');
                }
                $file = $request->file('olevelres');
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
                $fileNameToStore = strtolower($filename . '_' . time() . '_olevel.' . $extension);
                $destinationPath = public_path('uploads/postgraduate/');
                $file->move($destinationPath, $fileNameToStore);
                // $this->resizeImage($destinationPath . $fileNameToStore);
                $request->merge([
                    'olevel_result' => $destinationPath . $fileNameToStore,
                ]);
            }
            if ($request->hasFile('educert')) {
                if (!$request->file('educert')->isValid()) {
                    return redirect()->back()->with('error', 'File not valid');
                }
                $file = $request->file('educert');
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
                $fileNameToStore = strtolower($filename . '_' . time() . '_educert.' . $extension);
                $destinationPath = public_path('uploads/postgraduate/');
                $file->move($destinationPath, $fileNameToStore);
                // $this->resizeImage($destinationPath . $fileNameToStore);
                $request->merge([
                    'education_certificates' => $destinationPath . $fileNameToStore,
                ]);
            }
            if ($request->hasFile('edutrans')) {
                if (!$request->file('edutrans')->isValid()) {
                    return redirect()->back()->with('error', 'File not valid');
                }
                $file = $request->file('edutrans');
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
                $fileNameToStore = strtolower($filename . '_' . time() . '_edutrans.' . $extension);
                $destinationPath = public_path('uploads/postgraduate/');
                $file->move($destinationPath, $fileNameToStore);
                // $this->resizeImage($destinationPath . $fileNameToStore);
                $request->merge([
                    'education_transcript' => $destinationPath . $fileNameToStore,
                ]);
            }
            if ($request->hasFile('nysccert')) {
                if (!$request->file('nysccert')->isValid()) {
                    return redirect()->back()->with('error', 'File not valid');
                }
                $file = $request->file('nysccert');
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
                $fileNameToStore = strtolower($filename . '_' . time() . '_nysc.' . $extension);
                $destinationPath = public_path('uploads/postgraduate/');
                $file->move($destinationPath, $fileNameToStore);
                // $this->resizeImage($destinationPath . $fileNameToStore);
                $request->merge([
                    'nysc_certificate' => $destinationPath . $fileNameToStore,
                ]);
            }
            if ($request->hasFile('ref1')) {
                if (!$request->file('ref1')->isValid()) {
                    return redirect()->back()->with('error', 'File not valid');
                }
                $file = $request->file('ref1');
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
                $fileNameToStore = strtolower($filename . '_' . time() . '_ref1.' . $extension);
                $destinationPath = public_path('uploads/postgraduate/');
                $file->move($destinationPath, $fileNameToStore);
                // $this->resizeImage($destinationPath . $fileNameToStore);
                $request->merge([
                    'reference_1' => $destinationPath . $fileNameToStore,
                ]);
            }
            if ($request->hasFile('ref2')) {
                if (!$request->file('ref2')->isValid()) {
                    return redirect()->back()->with('error', 'File not valid');
                }
                $file = $request->file('ref2');
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
                $fileNameToStore = strtolower($filename . '_' . time() . '_ref2.' . $extension);
                $destinationPath = public_path('uploads/postgraduate/');
                $file->move($destinationPath, $fileNameToStore);
                // $this->resizeImage($destinationPath . $fileNameToStore);
                $request->merge([
                    'reference_2' => $destinationPath . $fileNameToStore,
                ]);
            }
            if ($request->hasFile('idc')) {
                if (!$request->file('idc')->isValid()) {
                    return redirect()->back()->with('error', 'File not valid');
                }
                $file = $request->file('idc');
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
                $fileNameToStore = strtolower($filename . '_' . time() . '_idcard.' . $extension);
                $destinationPath = public_path('uploads/postgraduate/');
                $file->move($destinationPath, $fileNameToStore);
                // $this->resizeImage($destinationPath . $fileNameToStore);
                $request->merge([
                    'idcard' => $destinationPath . $fileNameToStore,
                ]);
            }
            if ($request->hasFile('indig')) {
                if (!$request->file('indig')->isValid()) {
                    return redirect()->back()->with('error', 'File not valid');
                }
                $file = $request->file('indig');
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
                $fileNameToStore = strtolower($filename . '_' . time() . '_indig.' . $extension);
                $destinationPath = public_path('uploads/postgraduate/');
                $file->move($destinationPath, $fileNameToStore);
                // $this->resizeImage($destinationPath . $fileNameToStore);
                $request->merge([
                    'indigene_certificate' => $destinationPath . $fileNameToStore,
                ]);
            }
            if ($request->hasFile('passp')) {
                if (!$request->file('passp')->isValid()) {
                    return redirect()->back()->with('error', 'File not valid');
                }
                $file = $request->file('passp');
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
                $fileNameToStore = strtolower($filename . '_' . time() . '_passport.' . $extension);
                $destinationPath = public_path('uploads/postgraduate/');
                $file->move($destinationPath, $fileNameToStore);
                // $this->resizeImage($destinationPath . $fileNameToStore);
                $request->merge([
                    'passport' => $destinationPath . $fileNameToStore,
                ]);
            }

            $request->merge(['step' => 7]);
			$save = PgApplicant::where(['application_number' => $applicant->application_number])->update($request->except([
                '_token', 'olevelres', 'educert', 'edutrans', 'nysccert', 'ref1', 'ref2', 'idc', 'indig', 'passp'
            ]));
            return redirect('/pg-application-form');
		}
		

        return view('homepage.pg_uploads', compact('std'));
    }

    public function application_form(Request $request){
        $applicant = Session::get('pgapplicant');
        $std = Pgapplicant::find($applicant->id);
        $check = PgApplicationFee::where(['application_number' => $applicant->application_number, 'status' => 'PAID'])->first();
        return view('homepage.pg_full_form', compact('std', 'check'));
    }
}