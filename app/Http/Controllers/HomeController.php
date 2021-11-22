<?php

namespace App\Http\Controllers;

use App\Lga;
use App\User;
use App\State;
use App\IctFee;
use App\Faculty;
use App\FeeList;
use App\Program;
use App\Specialization;
use App\Pgapplicant;
use App\PgApplicationFee;
use App\Applicant;
use App\Institute;
use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Department;
use App\FeeHistory;
use App\Scholarship;
use App\StudentInfo;
use App\Helper\Helper;
use App\Http\Requests;
use App\ApplicationFee;
use App\Course_Student;
use App\Current_Semester_Running;
use App\LecturerCourse;
use App\Models\Article;
use App\Models\Category;
use App\DepartmentOption;
use App\Mail\VerifyEmail;
use App\Mail\BiodataEmail;
use App\Programme;
use App\Mail\ContactUsMail;
use App\Mail\ErrorLogEmail;
use App\Mail\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerifyAdmissionEmail;
use App\Semester;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\CashFlow\Single;

class HomeController extends Controller
{


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// $this->middleware('auth');
	}

	public function sett(){
		$users = ApplicationFee::where(['status' => 'PAID'])->select('application_number')->groupBy('application_number')->get();
		dd($users);
	}

	public function index(Request $request)
	{
		DB::statement("SET SQL_MODE=''");

		$fee_lists = FeeList::all();
		if (Auth::user()->dept_id !== null) {
			$departments = Department::where(['id' => Auth::user()->dept_id])->count();
			$faculties = DB::table('faculties')->where(['id' => Auth::user()->faculty_id])->count();
			$s = DB::table('student_infos')->where(['dept_id' => Auth::user()->dept_id])->select('registration_number')->get();
			$r = DB::table('student_infos')->where(['dept_id' => Auth::user()->dept_id])->select('id')->distinct('registration_number')->where('email_address', "!=", "")->get();
			$rib = DB::table('student_infos')->where(['dept_id' => Auth::user()->dept_id])->select('registration_number')->where('current_status', '=', "approved")->get();
			$g = DB::table('student_infos')->where(['dept_id' => Auth::user()->dept_id])->select('registration_number')->where('student_type', 'undergraduate')->get();
			$programs = DB::table('programs')->count();
			$db_students = 41813;
			$created_students = DB::table('student_infos')->select('registration_number')->where('Email_Address', '!=', '')->orWhere('status', 'verified')->count();
			$registered_students = StudentInfo::where('status', '!=', Null)->count();
			$paid_students =  DB::table('fee_histories')
				->where('fee_histories.status', '=', 'paid')->count();
			
			$paid_applicants = ApplicationFee::where(['status' => 'PAID'])
        ->select('application_number', 'name', 'phone', 'amount', 'reference_id', 'pms_id', 'status', 'created_at', 'updated_at')
        ->get()->keyBy('application_number')->count();

			$revenue =  DB::table('fee_histories')
				->where(['department_id' => Auth::user()->dept_id])
				->where('fee_histories.status', '=', 'paid')
				->sum('fee_histories.amount');
			$expected = DB::table('fee_histories')
				->where(['department_id' => Auth::user()->dept_id])
				->where('fee_histories.status', '=', 'unpaid')
				->sum('fee_histories.amount');
			$deficit = abs($revenue - $expected);
			$acceptance_total = DB::table('ict_payments')
				->where('ict_payments.status', '=', 'paid')->orWhere('ict_payments.status', '=', 'approved')
				->sum('ict_payments.amount');
		} else {

			if ($request->has('select_day')) {
				//dd($request->query('select_day'));
				if ($request->query('select_day') == 'today') {
					$transactions_overview = FeeHistory::select(['fee_histories.fee_id', 'fee_lists.fee_name', DB::raw('SUM(fee_histories.amount) as total_val')])
						->leftjoin('fee_lists', 'fee_histories.fee_id', '=', 'fee_lists.id')
						->where('fee_histories.status', 'paid')
						->where('fee_histories.created_at', '=', Carbon::today())
						->groupBy('fee_histories.fee_id')
						->groupBy('fee_lists.fee_name')
						->get()->toArray();
					$acceptance_fees = DB::table('ict_payments')
						->join('student_infos', 'ict_payments.student_id', '=', 'student_infos.registration_number')
						->select('ict_payments.*', 'student_infos.*', DB::raw('SUM(ict_payments.amount) as total_val'))->where(['ict_payments.status' => 'paid'])
						// ->orWhere(['ict_payments.status'=>'approved'])
						->where('ict_payments.created_at', '=', Carbon::today())
						->groupBy('ict_payments.student_id')
						->groupBy('ict_payments.reference_id')
						->get()->toArray();

					$showing = "Showing results for Today";
					
					// $putme = ApplicationFee::where(['status' => 'PAID'])->where('ict_payments.created_at', '=', Carbon::today())->sum('amount');
					$putme = ApplicationFee::where(['status' => 'PAID'])->where('created_at', '=', Carbon::today())
					->select('application_number', 'name', 'phone', 'amount', 'reference_id', 'pms_id', 'status', 'created_at', 'updated_at')
					->get()->keyBy('application_number')->sum('amount');
				} elseif ($request->query('select_day') == 'thisWeek') {
					$transactions_overview = FeeHistory::select(['fee_histories.fee_id', 'fee_lists.fee_name', DB::raw('SUM(fee_histories.amount) as total_val')])
						->leftjoin('fee_lists', 'fee_histories.fee_id', '=', 'fee_lists.id')
						->where('fee_histories.status', 'paid')
						->whereBetween('fee_histories.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
						->groupBy('fee_histories.fee_id')
						->groupBy('fee_lists.fee_name')
						->get()->toArray();

					$acceptance_fees = DB::table('ict_payments')
						->join('student_infos', 'ict_payments.student_id', '=', 'student_infos.registration_number')
						->select('ict_payments.*', 'student_infos.*', DB::raw('SUM(ict_payments.amount) as total_val'))->where(['ict_payments.status' => 'paid'])
						// ->orWhere(['ict_payments.status'=>'approved'])
						->whereBetween('ict_payments.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
						->groupBy('ict_payments.student_id')
						->groupBy('ict_payments.reference_id')
						->get()->toArray();

					$showing = "Showing results for This Week";
					// $putme = ApplicationFee::where(['status' => 'PAID'])->whereBetween('ict_payments.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount');
					$putme = ApplicationFee::where(['status' => 'PAID'])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
					->select('application_number', 'name', 'phone', 'amount', 'reference_id', 'pms_id', 'status', 'created_at', 'updated_at')
					->get()->keyBy('application_number')->sum('amount');
				} elseif ($request->query('select_day') == 'thisMonth') {
					$transactions_overview = FeeHistory::select(['fee_histories.fee_id', 'fee_lists.fee_name', DB::raw('SUM(fee_histories.amount) as total_val')])
						->leftjoin('fee_lists', 'fee_histories.fee_id', '=', 'fee_lists.id')
						->where('fee_histories.status', 'paid')
						->whereMonth('fee_histories.created_at', date('m'))
						->groupBy('fee_histories.fee_id')
						->groupBy('fee_lists.fee_name')
						->get()->toArray();

					$acceptance_fees = DB::table('ict_payments')
						->join('student_infos', 'ict_payments.student_id', '=', 'student_infos.registration_number')
						->select('ict_payments.*', 'student_infos.*', DB::raw('SUM(ict_payments.amount) as total_val'))->where(['ict_payments.status' => 'paid'])
						->whereMonth('ict_payments.created_at', date('m'))
						->groupBy('ict_payments.student_id')
						->groupBy('ict_payments.reference_id')
						->get()->toArray();

					$showing = "Showing results for This Month";
					// $putme = ApplicationFee::where(['status' => 'PAID'])->whereMonth('ict_payments.created_at', date('m'))->sum('amount');
					$putme = ApplicationFee::where(['status' => 'PAID'])->whereMonth('created_at', date('m'))
					->select('application_number', 'name', 'phone', 'amount', 'reference_id', 'pms_id', 'status', 'created_at', 'updated_at')
					->get()->keyBy('application_number')->sum('amount');
				} elseif ($request->query('select_day') == 'thisYear') {
					$transactions_overview = FeeHistory::select(['fee_histories.fee_id', 'fee_lists.fee_name', DB::raw('SUM(fee_histories.amount) as total_val')])
						->leftjoin('fee_lists', 'fee_histories.fee_id', '=', 'fee_lists.id')
						->where('fee_histories.status', 'paid')
						->whereYear('fee_histories.created_at', date('Y'))
						->groupBy('fee_histories.fee_id')
						->groupBy('fee_lists.fee_name')
						->get()->toArray();

					$acceptance_fees = DB::table('ict_payments')
						->join('student_infos', 'ict_payments.student_id', '=', 'student_infos.registration_number')
						->select('ict_payments.*', 'student_infos.*', DB::raw('SUM(ict_payments.amount) as total_val'))->where(['ict_payments.status' => 'paid'])
						->whereYear('ict_payments.created_at', date('Y'))
						->groupBy('ict_payments.student_id')
						->groupBy('ict_payments.reference_id')
						->get()->toArray();
						// $putme = ApplicationFee::where(['status' => 'PAID'])->whereYear('ict_payments.created_at', date('Y'))->sum('amount');
						$putme = ApplicationFee::where(['status' => 'PAID'])->whereYear('created_at', date('Y'))
					->select('application_number', 'name', 'phone', 'amount', 'reference_id', 'pms_id', 'status', 'created_at', 'updated_at')
					->get()->keyBy('application_number')->sum('amount');

					$showing = "Showing results for This Year";
				} else {
					$transactions_overview = FeeHistory::select(['fee_histories.fee_id', 'fee_lists.fee_name', DB::raw('SUM(fee_histories.amount) as total_val')])
						->leftjoin('fee_lists', 'fee_histories.fee_id', '=', 'fee_lists.id')
						->where('fee_histories.status', 'paid')
						->groupBy('fee_histories.fee_id')
						->groupBy('fee_lists.fee_name')
						->get()->toArray();

					$acceptance_fees = DB::table('ict_payments')
						->join('student_infos', 'ict_payments.student_id', '=', 'student_infos.registration_number')
						->select('ict_payments.*', 'student_infos.*', DB::raw('SUM(ict_payments.amount) as total_val'))->where(['ict_payments.status' => 'paid'])
						->groupBy('ict_payments.student_id')
						->groupBy('ict_payments.reference_id')
						->get()->toArray();
						// $putme = ApplicationFee::where(['status' => 'PAID'])->sum('amount');
						$putme = ApplicationFee::where(['status' => 'PAID'])
						->select('application_number', 'name', 'phone', 'amount', 'reference_id', 'pms_id', 'status', 'created_at', 'updated_at')
						->get()->keyBy('application_number')->sum('amount');
					}
			} elseif ($request->has('start_date') && $request->has('end_date')) {
				$from = date($request->query('start_date'));
				$to = date($request->query('end_date'));
				$transactions_overview = FeeHistory::select(['fee_histories.fee_id', 'fee_lists.fee_name', DB::raw('SUM(fee_histories.amount) as total_val')])
					->leftjoin('fee_lists', 'fee_histories.fee_id', '=', 'fee_lists.id')
					->where('fee_histories.status', 'paid')
					->whereBetween('fee_histories.created_at', [$from, $to])
					->groupBy('fee_histories.fee_id')
					->groupBy('fee_lists.fee_name')
					->get()->toArray();

				$acceptance_fees = DB::table('ict_payments')
					->join('student_infos', 'ict_payments.student_id', '=', 'student_infos.registration_number')
					->select('ict_payments.*', 'student_infos.*', DB::raw('SUM(ict_payments.amount) as total_val'))->where(['ict_payments.status' => 'paid'])
					->whereBetween('ict_payments.created_at', [$from, $to])
					->groupBy('ict_payments.student_id')
					->groupBy('ict_payments.reference_id')
					->get()->toArray();

				$showing = "Showing results between $from to $to";
				// $putme = ApplicationFee::where(['status' => 'PAID'])->whereBetween('ict_payments.created_at', [$from, $to])->sum('amount');
				$putme = ApplicationFee::where(['status' => 'PAID'])->whereBetween('created_at', [$from, $to])
					->select('application_number', 'name', 'phone', 'amount', 'reference_id', 'pms_id', 'status', 'created_at', 'updated_at')
					->get()->keyBy('application_number')->sum('amount');
			} else {

				$transactions_overview = FeeHistory::select(['fee_histories.fee_id', 'fee_lists.fee_name', DB::raw('SUM(fee_histories.amount) as total_val')])
					->leftjoin('fee_lists', 'fee_histories.fee_id', '=', 'fee_lists.id')
					->where('fee_histories.status', 'paid')
					->groupBy('fee_histories.fee_id')
					->groupBy('fee_lists.fee_name')
					->get()->toArray();

				$acceptance_fees = DB::table('ict_payments')
					->join('student_infos', 'ict_payments.student_id', '=', 'student_infos.registration_number')
					->select('ict_payments.*', 'student_infos.*', DB::raw('SUM(ict_payments.amount) as total_val'))->where(['ict_payments.status' => 'paid'])
					->groupBy('ict_payments.student_id')
					->groupBy('ict_payments.id')
					->groupBy('student_infos.id')
					->groupBy('ict_payments.reference_id')
					->get()->toArray();

					// $putme = ApplicationFee::where(['status' => 'PAID'])->sum('amount');
					$putme = ApplicationFee::where(['status' => 'PAID'])
						->select('application_number', 'name', 'phone', 'amount', 'reference_id', 'pms_id', 'status', 'created_at', 'updated_at')
						->get()->keyBy('application_number')->sum('amount');


				$showing = '';
			}

			// dd($acceptance_fees, $transactions_overview);
			$remita1 = FeeHistory::where(['status' => 'paid', 'payment_channel' => 'remita'])->get()->sum('amount');
			$remita2 = FeeHistory::where(['status' => 'paid', 'payment_channel' => Null])->get()->sum('amount');
			$remita = $remita1 + $remita2;
			$interswitch = FeeHistory::where(['status' => 'paid', 'payment_channel' => 'interswitch'])->get()->sum('amount');

			$departments = Department::count();
			$faculties = DB::table('faculties')->select('id')->distinct()->count();
			$r = DB::table('student_infos')->select('id')->distinct('registration_number')->where('email_address', "!=", "")->get();
			$s = DB::table('student_infos')->select('registration_number')->get();
			$rib = DB::table('student_infos')->select('registration_number')->where('current_status', '=', "approved")->get();
			$g = DB::table('student_infos')->select('registration_number')->where('student_type', 'undergraduate')->get();
			$programs = DB::table('programs')->count();
			$db_students = 41813;
			$created_students = DB::table('student_infos')->select('registration_number')->where('Email_Address', '!=', '')->orWhere('status', 'verified')->count();
			$registered_students = StudentInfo::where('status', '!=', Null)->count();
			$paid_students =  DB::table('fee_histories')
				->where('fee_histories.status', '=', 'paid')->count();
			
			$paid_applicants = ApplicationFee::where(['status' => 'PAID'])
			->select('application_number', 'name', 'phone', 'amount', 'reference_id', 'pms_id', 'status', 'created_at', 'updated_at')
			->get()->keyBy('application_number')->count();


			$revenue =  DB::table('fee_histories')
				->where('fee_histories.status', '=', 'paid')
				->sum('fee_histories.amount');
			$expected = DB::table('fee_histories')
				->where('fee_histories.status', '=', 'unpaid')
				->sum('fee_histories.amount');
			$deficit = abs($revenue - $expected);

			$acceptance_total = DB::table('ict_payments')
				->where('ict_payments.status', '=', 'paid')->orWhere('ict_payments.status', '=', 'approved')
				->sum('ict_payments.amount');

			// dd($acceptance_total);
		}

		if (auth()->user()->hasRole('lecturer')) {
			$student_count = 0;

			$lecturer_course = LecturerCourse::where('user_id', auth()->id());

			foreach ($lecturer_course->get() as $lectCourse) {
				$count = Course_Student::where('course_id', $lectCourse->course_id)->count();
				$student_count = $student_count + $count;
			}

			$lecturer_course_count = $lecturer_course->count();
			return view('dashboard-lecturer', compact('putme','revenue', 'expected', 'deficit', 'faculties', 'departments', 's', 'r', 'rib', 'g', 'male', 'female', 'acceptance_total', 'programs', 'db_students', 'student_count', 'created_students', 'registered_students', 'paid_students', 'transactions_overview', 'showing', 'acceptance_fees', 'lecturer_course_count'));
		} else {
			return view('dashboard', compact('paid_applicants','interswitch' ,'remita','putme','revenue', 'expected', 'deficit', 'faculties', 'departments', 's', 'r', 'rib', 'g', 'male', 'female', 'acceptance_total', 'programs', 'db_students', 'created_students', 'registered_students', 'paid_students', 'transactions_overview', 'showing', 'acceptance_fees'));
		}
		//dd($revenue, $expected, abs($deficit));

	}

	public function read()
	{
		auth()->user()->unreadNotifications->markAsRead();
		return redirect()->back();
	}


	public function homepage()
	{

		$faculties = Faculty::all();
		$articles = Article::where(['type' => 'article'])->orwhere(['type' => 'event'])->orwhere(['type' => 'announcement'])->published()
			->latest()
			->notDeleted()
			->orderby('articles.id', 'DESC')->paginate(6);

		$articles_latest = Article::where(['type' => 'article'])->published()->latest()->first();

		$events = Article::where(['type' => 'event'])->notDeleted()->orderby('id', 'DESC')->take(6)->get();


		$announcement = Article::where(['type' => 'announcement'])->published()
			->latest()
			->notDeleted()
			->orderby('articles.id', 'DESC')->take(1)->get();
		//dd($announcement);

		return view('homepage.home', compact('articles', 'events', 'faculties', 'announcement', 'articles_latest'));
	}

	public function pghome()
	{

		$faculties = Faculty::all();
		$articles = Article::where(['type' => 'article'])->orwhere(['type' => 'event'])->orwhere(['type' => 'announcement'])->published()
			->latest()
			->notDeleted()
			->orderby('articles.id', 'DESC')->paginate(6);

		$articles_latest = Article::where(['type' => 'article'])->published()->latest()->first();

		$events = Article::where(['type' => 'event'])->notDeleted()->orderby('id', 'DESC')->take(6)->get();


		$announcement = Article::where(['type' => 'announcement'])->published()
			->latest()
			->notDeleted()
			->orderby('articles.id', 'DESC')->take(1)->get();
		//dd($announcement);

		return view('homepage.pghome', compact('articles', 'events', 'faculties', 'announcement', 'articles_latest'));
	}

	public function pg_application(Request $request){
		if ($request->isMethod('post')) {

			try {

				$id = trim($request->matric_number);
				$password = $request->password;
				if ($password !== $request->cnf_password) {
					return back()->with('error', 'Password mismatch!');
				}
				//check if student already register with email, then login
				$check = StudentInfo::where('Email_Address', $request->email)->first();
				if ($check) {
					$new_dataA['email'] = $request->email;
					Mail::to(strtolower($request->email))->send(new VerifyEmail($new_dataA));
					return back()->with('error', 'Email is already Registered, another verification link has been sent, kindly check your email');
				}
				
				$count = StudentInfo::where('registration_number', $id)->count();
				
			
				$data = StudentInfo::where('registration_number', $id)->first();
				
				if (!$data) {
					return back()->with('error', "Something went wrong, please contact technical support using the ChatBox or Visit the FAQ page");
				}

				$data->Email_Address = strtolower($request->email);
				$data->Student_Mobile_Number = $request->phone;
				$data->student_group = $request->type;
				$data->password = Hash::make($request->password);

				//to be removed later
				// $data->status ='verified';
				//generate matric number automatically
				// if (strlen($data->matric_number) < 2) {
				// 	$data->matric_number = $this->generateMatric($request->year);
				// }
				$data->save();

				$curr_session = Helper::current_semester();
				$student_id = $data->matric_number;

				$check = IctFee::where(['student_id' => $student_id, 'session_id' => $curr_session])->count();
				Session::put('student', $data);
				Session::put('student_id', $student_id);

				// if($check < 1){
				// 	return redirect()->route('student.ict');
				// }
				$new_data['email'] = $request->email;
				Mail::to(strtolower($request->email))->send(new VerifyEmail($new_data));
				return back()->with('success', 'An email verification link has been sent to your email, please click the link to verify your email before continuing on this portal. If you don\'t see the verification mail in your inbox, check your spam mail / promotions folder and mark it as "Not Spam" before clicking to verify');
				// return back()->with('success', 'Registration successful, Kindly login to continue!');
				// return redirect('registration-steps');

			} catch (\Exception $e) {
				return back()->with('error', 'An error occured, contact support');
			}
		}
		// $faculties = Faculty::all();
		// $states = State::all();
		return view('homepage.pg_registration');
	}

	public function findStudentAdmission($request)
	{

		if ($request->year == "2014") {
			$csv_file = public_path('docs/students_2014.csv');
		} elseif ($request->year == "2015") {
			$csv_file = public_path('docs/students_2015.csv');
		} elseif ($request->year == "2016") {
			$csv_file = public_path('docs/students_2016.csv');
		} elseif ($request->year == "2017") {
			$csv_file = public_path('docs/students_2017.csv');
		} elseif ($request->year == "2018") {
			$csv_file = public_path('docs/students_2018.csv');
		} elseif ($request->year == "2019") {
			$csv_file = public_path('docs/students_2019.csv');
		} elseif ($request->year == "2020") {
			$csv_file = public_path('docs/students_2020.csv');
		}

		$user_information = fopen("$csv_file", "r");
		$row = 0;
		while ($oldUser = fgetcsv($user_information)) {
			//precaution, even though we double checked the csv files
			// dd($oldUser[2]);
			if ($row == 0) {
				$error = false;
				// if(strtolower($oldUser[0]) !== "s/n"){
				//     return back()->with('error','S/N should be the first column');
				// }
				if (strtolower(trim($oldUser[1])) !== 'lastname') {
					$error = true;
					$erm[] = 'lastname should be the second column in file ' . $csv_file;
					Log::info('lastname should be the second column in file ' . $csv_file);
					//return back()->with('error','lastname should be the second column');
				}
				if (strtolower(trim($oldUser[2])) !== 'firstname') {
					$error = true;
					$erm[] = 'firstname should be the third column in file ' . $csv_file;
					Log::info('firstname should be the third column in file ' . $csv_file);
					//return back()->with('error','firstname should be the third column');
				}
				if (strtolower(trim($oldUser[3])) !== 'middlename') {
					$error = true;
					$erm[] = 'middlename should be the fourth column in file ' . $csv_file;
					Log::info('middlename should be the fourth column in file ' . $csv_file);
					// return back()->with('error','middlename should be the fourth column');
				}
				if (strtolower(trim($oldUser[4])) !== 'faculty') {
					$error = true;
					$erm[] = 'faculty should be the fifth column in file ' . $csv_file;
					Log::info('faculty should be the fifth column in file ' . $csv_file);
					// return back()->with('error','faculty should be the fifth column');
				}
				if (strtolower(trim($oldUser[5])) !== 'department') {
					$error = true;
					$erm[] = 'department should be the sixth column in file ' . $csv_file;
					Log::info('department should be the sixth column in file ' . $csv_file);
					// return back()->with('error','department should be the sixth column');
				}
				if (strtolower(trim($oldUser[6])) !== 'regno' && strtolower(trim($oldUser[6])) !== 'reg no' && strtolower(trim($oldUser[6])) !== 'reg no.') {
					$error = true;
					$erm[] = 'reg no should be the seventh column in file ' . $csv_file;
					Log::info('reg no should be the seventh column in file ' . $csv_file);
					// return back()->with('error','reg no should be the seventh column');
				}
				if (strtolower(trim($oldUser[8])) !== 'state') {
					$error = true;
					$erm[] = 'state should be the ninth column ' . $csv_file;
					Log::info('state should be the ninth column ' . $csv_file);
					// return back()->with('error','state should be the ninth column');
				}
				if (strtolower(trim($oldUser[9])) !== 'lga') {
					$error = true;
					$erm[] = 'lga should be the tenth column ' . $csv_file;
					Log::info('lga should be the tenth column ' . $csv_file);
					// return back()->with('error','lga should be the tenth column');
				}
				if (strtolower(trim($oldUser[11])) !== 'sex') {
					$error = true;
					$erm[] = 'sex should be the twelveth column in file ' . $csv_file;
					Log::info('sex should be the twelveth column in file ' . $csv_file);
					// return back()->with('error','sex should be the twelveth column');
				}
				if (strtolower(trim($oldUser[12])) !== 'admission_year') {
					$error = true;
					$erm[] = 'admission_year should be the thirteenth column in file ' . $csv_file;
					Log::info('admission_year should be the thirteenth column in file ' . $csv_file);
					// return back()->with('error','admission_year should be the thirteenth column');
				}
				if (count($oldUser) !== 13) {
					$error = true;
					$erm[] = 'The number of column didn\'t match the sample format in file ' . $csv_file;
					Log::info('The number of column didn\'t match the sample format in file ' . $csv_file);
					// return back()->with('error','The number of column didn\'t match the sample format');
				}

				if ($error) {
					Mail::to('adekoya.adebayojubril@gmail.com')->send(new ErrorLogEmail($erm));
					return $error;
				}
			}

			if ($row != 0) {

				if ($request->matric_number ==  $oldUser[6] || $request->matric_number == $oldUser[7]) {
					$userFound = true;
					break;  //exit the loop
				}
			}
			$row++;
		}


		// dd($oldUser);
		if ($userFound) {
			$faculty = Faculty::where(['name' => trim($oldUser[4])])->first();
			$department = Department::where(['name' => trim($oldUser[5])])->first();
			$state = State::where(['name' => trim($oldUser[8])])->first();
			$lga = Lga::where(['name' => trim($oldUser[9])])->first();

			$user =  new StudentInfo();
			$user->first_name = $oldUser[1];
			$user->last_name = $oldUser[2];
			$user->middle_name = $oldUser[3];
			$user->password = Hash::make($request->password);
			$user->temp_password = base64_encode($request->password);
			$user->faculty_id = $faculty !== null ? $faculty->id : null;
			$user->dept_id  = $department !== null ? $department->id : null;
			$user->registration_number = $oldUser[6];
			$user->matric_number = $oldUser[7];
			if (strlen($oldUser[7]) < 2) {
				$user->matric_number = $this->generateMatric($request->year);
			}
			$user->state_of_origin =  $state !== null ? $state->name : null;
			$user->lga = $lga !== null ? $lga->name : null;
			$user->level = $oldUser[10];
			$user->gender = $oldUser[11];
			$user->Batch = $oldUser[12];


			if (@$user !== null) {
				// dd($user);
				$user->save();
				return true;
			} else {
				return back()->with('error', 'Please contact technical support using the Chatbox or Visit the FAQ page');
			}
		} else {
			return back()->with('error', 'Invalid Registration or Matric Number');
		}
	}

	public function admission_portal()
	{
		$categories = Category::where(['name' => 'Admission', 'type' => 'menu'])->get();
		return view('homepage.admission_portal', compact('categories'));
	}

	public function student_portal()
	{
		$categories = Category::where(['name' => 'Returning Students', 'type' => 'menu'])
			->orWhere(['name' => 'New Students'])->get();
		return view('homepage.student_portal', compact('categories'));
	}

	public function staff_portal()
	{
		$categories = Category::where(['name' => 'Staffs', 'type' => 'menu'])->get();
		return view('homepage.staff_portal', compact('categories'));
	}

	public function alumni_portal()
	{
		$categories = Category::where(['name' => 'alumni', 'type' => 'menu'])->get();
		return view('homepage.alumni_portal', compact('categories'));
	}

	public function admission_instruction(Request $request)
	{
		$categories = Category::where(['name' => 'Admission'])->get();
		// dd($categories);
		return view('homepage.admission_instruction', compact('categories'));
	}

	public function generateAppNum($year)
	{
		$mat = 'ICEP/' . $year . '/' . substr(hexdec(uniqid()), -5);
		$check = Applicant::where(['application_number' => $mat])->first();
		if ($check == null) {
			return $mat;
		} else {
			$this->generateAppNum($year);
		}
	}

	public function admission_application(Request $request)
	{
		if ($request->isMethod('post')) {
			if ($request->type == 'jamb' || $request->type == 'de') {
				$std = Applicant::where(['application_number' => $request->jamb_reg])->first();
				if ($std) {
					if ($request->password !== $request->conf_password) {
						return back()->with('error', 'Password mismatch');
					}
					$check_email = Applicant::where(['email' => $request->email])->count();
					if ($check_email > 0) {
						return back()->with('error', 'Email Already Taken');
					}
					$std->email = $request->email;
					$std->full_name = $request->full_name;
					$std->password = Hash::make($request->password);
					$std->phone_number = $request->phone_number;
					$std->mode_of_admission = $request->mode_of_admission;
					$std->save();

					$new_data['email'] = $request->email;
					Mail::to(strtolower($request->email))->send(new VerifyAdmissionEmail($new_data));
					return back()->with('success', 'Congratulations! ' . $std->full_name . ' , you have successfully sign up to the Imo State University Post- UTME application portal . Kindly visit your email account to verify your email to continue');

				} else {

					$check_reg = Applicant::where(['application_number' => $request->jamb_reg])->count();
					if ($check_reg > 0) {
						return back()->with('error', 'Already Registered');
					}
					$check_email = Applicant::where(['email' => $request->email])->count();
					if ($check_email > 0) {
						return back()->with('error', 'Email Already Taken');
					}
					$data['email'] = $request->email;
					$data['password'] = Hash::make($request->password);
					$data['phone_number'] = $request->phone_number;
					$data['mode_of_admission'] = $request->mode_of_admission;
					$data['year'] = 2021;
					$data['application_number'] = $request->jamb_reg;
                    $data['type'] = $request->type == 'jamb' ? 'jamb' : 'DE';
                    

					$create = Applicant::create($data);
					if($create){
						Mail::to(strtolower($request->email))->send(new VerifyAdmissionEmail($data));
						return back()->with('success', 'Congratulations! you have successfully sign up to the Imo State University Post- UTME application portal . Kindly visit your email account to verify your email to continue');
					}
					return back()->with('error', 'Invalid Jamb No');
				}
			} elseif ($request->type == 'icep') {

				// $check = Applicant::where(['type' => $request->type,'email' => $request->email])->count();
				// if($check>0){
				// 	return back()->with('error', 'Email already taken');
				// }else{
				// 	$request->merge([
				// 		'application_number' => $this->generateAppNum(date('Y')), 
				// 		'full_name' => $request->first_name . ' ' . $request->middle_name .' '. $request->last_name
				// 	]);
				// 	Applicant::create($request->all());
				// 	Session::put('jamb_reg', $request->application_number);
				// 	return redirect('/application-step1');
				// }
			}
		}
		$undergraduate = Program::where(['name' => 'undergraduate'])->first();
		$icep = Program::where(['name' => 'ICEP'])->first();
		$postgraduate = Program::where(['name' => 'postgraduate'])->first();
		return view('homepage.admission_application', compact('icep', 'undergraduate', 'postgraduate'));
	}

	public function application_step1(Request $request)
	{
		$jamb_reg = Session::get('jamb_reg');
		if ($jamb_reg == null) {
			return redirect('/admission-application');
		}
		if ($request->isMethod('post')) {
			$std = Applicant::where(['application_number' => $jamb_reg])->update($request->except('_token'));
			return redirect('/application-step2');
		}
		$std = Applicant::where(['application_number' => $jamb_reg])->first();
		return view('homepage.applicant_details', compact('std'));
	}

	public function application_step2(Request $request)
	{
		$jamb_reg = Session::get('jamb_reg');
		if ($jamb_reg == null) {
			return redirect('/admission-application');
		}
		$std = Applicant::where(['application_number' => $jamb_reg])->first();
		$fee = FeeList::where(['fee_name' => 'PUTME Fee'])->first();
		$check = ApplicationFee::where(['application_number' => $jamb_reg, 'status' => 'PAID'])->first();
		if ($check !== null) {
			return redirect('/application-step3/' . $jamb_reg)->with('error', 'Pay application fee');
		}
		return view('homepage.application_fee', compact('fee', 'std'));
	}

	public function application_step3(Request $request, $id)
	{
		$jamb_reg = $id;
		// dd($jamb_reg);
		if ($jamb_reg == null) {
			return redirect('/admission-application');
		}
		$check = ApplicationFee::where(['application_number' => $id, 'status' => 'PAID'])->first();
		if ($request->isMethod('post')) {
			$save = Applicant::where(['application_number' => $jamb_reg])->update($request->except(['_token']));
			return redirect('/application-step4');
		}
		if (!$check) {
			return redirect('/application-step2')->with('error', 'Pay application fee');
		}
		$std = Applicant::where(['application_number' => $jamb_reg])->first();
		$departments = Department::all();
		$states = State::all();

		return view('homepage.profile', compact('std', 'check', 'departments', 'states'));
	}

	public function application_step4(Request $request)
	{
		$all_1 = [];
		$all_2 = [];
		$jamb_reg = Session::get('jamb_reg');
		if ($jamb_reg == null) {
			return redirect('/admission-application');
		}
		$check = ApplicationFee::where(['application_number' => $jamb_reg, 'status' => 'PAID'])->first();
		if (!$check) {
			return redirect('/application-step2')->with('error', 'Pay application fee');
		}
		$std = Applicant::where(['application_number' => $jamb_reg])->first();
		if ($std->status == 'completed') {
			return redirect('/exam-pass');
		}
		if ($request->isMethod('post')) {
			$exam1 = $request->exams[1];

			$exam_details_1['type'] = $request->exam_type_1;
			$exam_details_1['school'] = $request->school_1;
			$exam_details_1['exam_number'] = $request->exam_number_1;
			$ex1 = json_encode($exam_details_1);
			$details['exam_1'] = $ex1;

			foreach ($exam1['subject'] as $key => $value) {
				if ($value !== null) {
					$all_1[$value] = $exam1['grade'][$key];
				}
			}
			if ($request->exam_type_2 !== null) {
				$exam_details_2['type'] = $request->exam_type_2;
				$exam_details_2['school'] = $request->school_2;
				$exam_details_2['exam_number'] = $request->exam_number_2;

				$exam2 = $request->exams[2];
				foreach ($exam2['subject'] as $key => $value) {
					if ($value !== null) {
						$all_2[$value] = $exam1['grade'][$key];
					}
				}
				$olevel2 = json_encode($all_2);
				$ex2 = json_encode($exam_details_2);
				$details['exam_2'] = $ex2;
				$details['olevel_2'] = $olevel2;
			}

			$olevel1 = json_encode($all_1);
			$details['olevel_1'] = $olevel1;
			$details['status'] = 'completed';

			if ($std->mode_of_admission == 'Direct Entry') {

				$details['higher_institution_attended'] = $request['higher_institution_attended'];
				$details['programme_studied'] = $request['programme_studied'];
				$details['certificate_obtained'] = $request['certificate_obtained'];
				$details['grade_achieved'] = $request['grade_achieved'];

				if ($request->hasFile('attach_certificate')) {

					if (!$request->file('attach_certificate')->isValid()) {
						return redirect()->back()->with('error', 'image not valid');
					}

					$file = $request->file('attach_certificate');

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

					$destinationPath = base_path('/uploads/images/direct-entry-certificates/');

					$file->move($destinationPath, $fileNameToStore);

					// $this->resizeImage($destinationPath . $fileNameToStore);
					$details['attached_certificate_path'] = $destinationPath . $fileNameToStore;
				}
			}

			$update = Applicant::where(['application_number' => $jamb_reg])->update($details);
			if ($update) {
				return redirect('/exam-pass');
			}
		}
		return view('homepage.olevel', ['application' => $std]);
	}

	public function exam_pass(Request $request)
	{
		$jamb_reg = Session::get('jamb_reg');
		if ($jamb_reg == null) {
			return redirect('/admission-application');
		}
		$check = ApplicationFee::where(['application_number' => $jamb_reg, 'status' => 'PAID'])->first();
		if (!$check) {
			return redirect('/application-step2')->with('error', 'Pay application fee');
		}
		$std = Applicant::where(['application_number' => $jamb_reg])->first();

		return view('homepage.exam_pass', compact('std', 'check'));
	}

	public function logout()
	{

		//Session::put('student_id','');
		session()->flush();
		return redirect('/admission-application')->with('message', 'Successfully logout');
	}

	public function registration_steps()
	{

		return view('homepage.reg_steps');
	}

	public function faq()
	{

		return view('homepage.faq');
	}

	public function get_faculty(Request $request, $slug)
	{
		$faculty = Faculty::where(['slug' => $slug])->first();
		$departments = Department::where(['faculty_id' => $faculty->id])->get();
		// dd($departments, $faculty->id);
		return view('faculty.faculties', compact('faculty', 'departments'));
	}

	public function verify(Request $request, $email)
	{
		$email_address = base64_decode($email);
		$email = StudentInfo::where(['Email_Address' => $email_address])->first();
		if (is_null($email)) {
			$error = 1;
			return view('homepage.verified', compact('error'));
		}
		$email->status = 'verified';
		$email->save();
		// dd($email);
		Session::put('student', $email);
		$student_id = $email['matric_number'];
		Session::put('student_id', $student_id);
		Session::put('student_type', $email['Batch'] == '2020/2021' ? 'new' : 'old');

		return view('homepage.verified', compact('email_address', 'email'));
	}

	public function admission_verify(Request $request, $email)
	{
		$email_address = base64_decode($email);
		$email = Applicant::where(['email' => $email_address])->first();
		$email->status = 'verified';
		$email->save();
		// dd($email);
		Session::put('student', $email);
		$student_id = $email['matric_number'];
		Session::put('jamb_reg', $email->application_number);
		Session::put('student_id', $student_id);

		return view('homepage.admission_verified', compact('email_address', 'email'));
	}

	public function pay_acceptance_fee(Request $request)
	{
		$fee = FeeList::where('fee_name', 'Undergraduate Program - Acceptance Fee')->first();

		if (Session::get('student_id') === null && $fee->amount > 0) {
			return redirect('/student-portal')->with('error', 'Please signup or login to pay acceptance fee!');
		}

		//check if verified
		$std =  StudentInfo::where('registration_number', Session::get('student_id'))->first();
		if ($std && $std->status == null) {
			return redirect('/student-portal')->with('error', 'Please verify your email to continue! Check your inbox and spam folder also for the verification email.');
		}

		return view('homepage.acceptance_fee', compact('fee', 'std'));
	}

	public function verify_acceptance_fee(Request $request)
	{
		if (Session::get('student_id') === null) {
			return redirect('/student-portal');
		}
		// dd(Session::get('student_id'));
		if ($request->isMethod('post')) {
			if ($request->receipt_image) {
				$extensions = ['jpeg', 'png', 'jpg'];
				$extension = $request->receipt_image->getClientOriginalExtension();
				if (!in_array($extension, $extensions)) {
					return back()->with('error', 'Invalid file type, upload a jpeg,png or jpg file');
				}
				$imageName = time() . '.' . $request->receipt_image->getClientOriginalExtension();
				$request->receipt_image->move(public_path('/uploads/images/receipts'), $imageName);
				$request->merge(['receipt' => $imageName]);
			}
			$fee = IctFee::where('student_id', $request->student_id)->first();
			if ($fee && $fee->status == 'verified') {
				return redirect('/student-portal')->with('success', 'Your Acceptance fee is valid and verified, Please login to complete your registration!');
			} elseif ($fee && $fee->status == 'pending') {
				return redirect('/student-portal')->with('success', 'You have uploaded your receipt, kindly await verification within 24hours!');
			} else {
				$fee = new IctFee();
			}
			$fee->student_id = $request->student_id;
			$fee->receipt = $request->receipt;
			$fee->paid_via = $request->paid_via;
			$fee->date = $request->date;
			$fee->reference_id = "";
			$fee->session_id = "";
			$fee->amount = "";
			$fee->status = "pending";
			$fee->save();

			// dd($fee);

			return redirect('/student-portal')->with('success', 'Receipt uploaded, You will be notified by email once your acceptance payment receipt has been verified within 24hours!');
		}

		return view('homepage.verify_acceptance_fee');
	}

	public function scholarships()
	{
		return view('homepage.scholarships');
	}

	public function scholarship_application(Request $request)
	{
		if ($request->isMethod('post')) {
			// dd($request->all());
			$check = StudentInfo::where(['matric_number' => $request->matric_number])->count();
			if ($check > 0) {
				$store = Scholarship::create($request->all());
				if ($store) {
					return back()->with('success', 'Application submitted');
				} else {
					return back()->with('error', 'An error occured');
				}
			} else {
				return back()->with('error', 'Invalid Matric Number');
			}
		}
		return view('homepage.scholarship_application');
	}

	public function generateMatric($year)
	{
		$mat = 'IMSU/' . $year . '/' . substr(hexdec(uniqid()), -5);
		$check = StudentInfo::where(['matric_number' => $mat])->first();
		if ($check == null) {
			return $mat;
		} else {
			$this->generateMatric($year);
		}
	}


	public function findStudent($request)
	{

		if ($request->year == "2014") {
			$csv_file = public_path('docs/students_2014.csv');
		} elseif ($request->year == "2015") {
			$csv_file = public_path('docs/students_2015.csv');
		} elseif ($request->year == "2016") {
			$csv_file = public_path('docs/students_2016.csv');
		} elseif ($request->year == "2017") {
			$csv_file = public_path('docs/students_2017.csv');
		} elseif ($request->year == "2018") {
			$csv_file = public_path('docs/students_2018.csv');
		} elseif ($request->year == "2019") {
			$csv_file = public_path('docs/students_2019.csv');
		} elseif ($request->year == "2020") {
			$csv_file = public_path('docs/students_2020.csv');
		}

		// dd($request->all(), $csv_file );
		// $csv_file = public_path('docs/2020_2021.csv');
		$user_information = fopen("$csv_file", "r");
		$row = 0;
		// dd($user_information);
		while ($oldUser = fgetcsv($user_information)) {
			//precaution, even though we double checked the csv files
			// dd($oldUser[2]);
			if ($row == 0) {
				$error = false;
				// if(strtolower($oldUser[0]) !== "s/n"){
				//     return back()->with('error','S/N should be the first column');
				// }
				if (strtolower(trim($oldUser[1])) !== 'lastname') {
					$error = true;
					$erm[] = 'lastname should be the second column in file ' . $csv_file;
					Log::info('lastname should be the second column in file ' . $csv_file);
					//return back()->with('error','lastname should be the second column');
				}
				if (strtolower(trim($oldUser[2])) !== 'firstname') {
					$error = true;
					$erm[] = 'firstname should be the third column in file ' . $csv_file;
					Log::info('firstname should be the third column in file ' . $csv_file);
					//return back()->with('error','firstname should be the third column');
				}
				if (strtolower(trim($oldUser[3])) !== 'middlename') {
					$error = true;
					$erm[] = 'middlename should be the fourth column in file ' . $csv_file;
					Log::info('middlename should be the fourth column in file ' . $csv_file);
					// return back()->with('error','middlename should be the fourth column');
				}
				if (strtolower(trim($oldUser[4])) !== 'faculty') {
					$error = true;
					$erm[] = 'faculty should be the fifth column in file ' . $csv_file;
					Log::info('faculty should be the fifth column in file ' . $csv_file);
					// return back()->with('error','faculty should be the fifth column');
				}
				if (strtolower(trim($oldUser[5])) !== 'department') {
					$error = true;
					$erm[] = 'department should be the sixth column in file ' . $csv_file;
					Log::info('department should be the sixth column in file ' . $csv_file);
					// return back()->with('error','department should be the sixth column');
				}
				if (strtolower(trim($oldUser[6])) !== 'regno' && strtolower(trim($oldUser[6])) !== 'reg no' && strtolower(trim($oldUser[6])) !== 'reg no.') {
					$error = true;
					$erm[] = 'reg no should be the seventh column in file ' . $csv_file;
					Log::info('reg no should be the seventh column in file ' . $csv_file);
					// return back()->with('error','reg no should be the seventh column');
				}
				if (strtolower(trim($oldUser[7])) !== 'matno' && strtolower(trim($oldUser[7])) !== 'mat no' && strtolower(trim($oldUser[7])) !== 'mat no.') {
					$error = true;
					$erm[] = 'reg no should be the seventh column in file ' . $csv_file;
					Log::info('Matric No should be the eighth column in file ' . $csv_file);
					// return back()->with('error','S/N should be the eighth column');
				}
				if (strtolower(trim($oldUser[8])) !== 'state') {
					$error = true;
					$erm[] = 'state should be the ninth column ' . $csv_file;
					Log::info('state should be the ninth column ' . $csv_file);
					// return back()->with('error','state should be the ninth column');
				}
				if (strtolower(trim($oldUser[9])) !== 'lga') {
					$error = true;
					$erm[] = 'lga should be the tenth column ' . $csv_file;
					Log::info('lga should be the tenth column ' . $csv_file);
					// return back()->with('error','lga should be the tenth column');
				}
				if (strtolower(trim($oldUser[10])) !== 'level') {
					$error = true;
					$erm[] = 'level should be the eleventh column in file ' . $csv_file;
					Log::info('level should be the eleventh column in file ' . $csv_file);
					// return back()->with('error','level should be the eleventh column');
				}
				if (strtolower(trim($oldUser[11])) !== 'sex') {
					$error = true;
					$erm[] = 'sex should be the twelveth column in file ' . $csv_file;
					Log::info('sex should be the twelveth column in file ' . $csv_file);
					// return back()->with('error','sex should be the twelveth column');
				}
				if (strtolower(trim($oldUser[12])) !== 'admission_year') {
					$error = true;
					$erm[] = 'admission_year should be the thirteenth column in file ' . $csv_file;
					Log::info('admission_year should be the thirteenth column in file ' . $csv_file);
					// return back()->with('error','admission_year should be the thirteenth column');
				}
				if (count($oldUser) !== 13) {
					$error = true;
					$erm[] = 'The number of column didn\'t match the sample format in file ' . $csv_file;
					Log::info('The number of column didn\'t match the sample format in file ' . $csv_file);
					// return back()->with('error','The number of column didn\'t match the sample format');
				}

				if ($error) {
					Mail::to('adekoya.adebayojubril@gmail.com')->send(new ErrorLogEmail($erm));
					return $error;
				}
			}

			if ($row != 0) {
				// if ($request->type == 'new' && $request->matric_number ==  $oldUser[6]) {
				// 	$userFound = true;
				// 	break;  //exit the loop
				// }
				// if ($request->type == 'returning' && $request->matric_number == $oldUser[7]) {
				// 	$userFound = true;
				// 	break;  //exit the loop
				// }
				// if ($request->matric_number ==  $oldUser[6] || $request->matric_number == $oldUser[7]) {
				if ($request->matric_number ==  $oldUser[6]) {
					$userFound = true;
					break;  //exit the loop
				}
			}
			$row++;
		}


		// dd($oldUser);
		if ($userFound) {
			$faculty = Faculty::where(['name' => trim($oldUser[4])])->first();
			$department = Department::where(['name' => trim($oldUser[5])])->first();
			$state = State::where(['name' => trim($oldUser[8])])->first();
			$lga = Lga::where(['name' => trim($oldUser[9])])->first();

			$user =  new StudentInfo();
			$user->first_name = $oldUser[1];
			$user->last_name = $oldUser[2];
			$user->middle_name = $oldUser[3];
			$user->password = Hash::make($request->password);
			$user->temp_password = base64_encode($request->password);
			$user->faculty_id = $faculty !== null ? $faculty->id : null;
			$user->dept_id  = $department !== null ? $department->id : null;
			$user->registration_number = $oldUser[6];
			$user->matric_number = $oldUser[7];
			if (strlen($oldUser[7]) < 2) {
				$user->matric_number = $this->generateMatric($request->year);
			}
			$user->state_of_origin =  $state !== null ? $state->name : null;
			$user->lga = $lga !== null ? $lga->name : null;
			$user->level = $oldUser[10];
			$user->gender = $oldUser[11];
			$user->Batch = $oldUser[12];


			if (@$user !== null) {
				// dd($user);
				$user->save();
				return true;
			} else {
				return back()->with('error', 'Please contact technical support using the Chatbox or Visit the FAQ page');
			}
		} else {
			return back()->with('error', 'Invalid Registration Number');
		}
	}

	public function registration(Request $request)
	{

		if ($request->isMethod('post')) {

			try {

				$id = trim($request->matric_number);
				$password = $request->password;
				if ($password !== $request->cnf_password) {
					return back()->with('error', 'Password mismatch!');
				}
				//check if student already register with email, then login
				$check = StudentInfo::where('Email_Address', $request->email)->first();
				if ($check) {
					$new_dataA['email'] = $request->email;
					Mail::to(strtolower($request->email))->send(new VerifyEmail($new_dataA));
					return back()->with('error', 'Email is already Registered, another verification link has been sent, kindly check your email');
				}
				//check if we already uploaded the student record manually
				//using only registration number
				//if ($request->type == 'new') {
				$count = StudentInfo::where('registration_number', $id)->count();
				// } else {
				// 	$count = StudentInfo::where('matric_number', $id)->count();
				// }
				//find the student and create the record
				if ($count < 1) {
					$res = $this->findStudent($request);
				}
				//find the student, either we already uploaded it or we just created it above
				//updated to using only registration number now
				//if ($request->type == 'new') {
				$data = StudentInfo::where('registration_number', $id)->first();
				// } else {
				// 	$data = StudentInfo::where('matric_number', $id)->first();
				// }
				// dd($data, '453');
				//if we created the record using "findStudent function" and still cant find it, there is a problem
				if (!$data) {
					return back()->with('error', "Student registration number not found on the portal, Please contact the school administration via the live chat");
				}

				$data->Email_Address = strtolower($request->email);
				$data->Student_Mobile_Number = $request->phone;
				$data->student_group = $request->type;
				$data->password = Hash::make($request->password);

				//to be removed later
				// $data->status ='verified';
				//generate matric number automatically
				// if (strlen($data->matric_number) < 2) {
				// 	$data->matric_number = $this->generateMatric($request->year);
				// }
				$data->save();

				$curr_session = Helper::current_semester();
				$student_id = $data->matric_number;

				$check = IctFee::where(['student_id' => $student_id, 'session_id' => $curr_session])->count();
				Session::put('student', $data);
				Session::put('student_id', $student_id);

				// if($check < 1){
				// 	return redirect()->route('student.ict');
				// }
				$new_data['email'] = $request->email;
				Mail::to(strtolower($request->email))->send(new VerifyEmail($new_data));
				return back()->with('success', 'An email verification link has been sent to your email, please click the link to verify your email before continuing on this portal. If you don\'t see the verification mail in your inbox, check your spam mail / promotions folder and mark it as "Not Spam" before clicking to verify');
				// return back()->with('success', 'Registration successful, Kindly login to continue!');
				// return redirect('registration-steps');

			} catch (\Exception $e) {
				return back()->with('error', 'An error occured, contact support');
			}
		}
		$faculties = Faculty::all();
		$states = State::all();
		return view('homepage.registration2', compact('faculties', 'states'));
	}

	public function login(Request $request)
	{

		if ($request->isMethod('post')) {

			$id = trim($request->matric_number);
			$password = $request->password;
			if ($request->type == 'Admission Applicant') {
				$applicant = Applicant::where(['application_number' => $id])->first();
				if (!Hash::check($password, $applicant->password)) {
					return back()->with('error', 'Invalid login credentials!');
				}
				if ($applicant->status == null) {
					return back()->with('error', 'Verify Your Email Address!');
				}
				Session::put('verified_applicant', $applicant);
				Session::put('jamb_reg', $applicant->application_number);
				$check = ApplicationFee::where(['application_number' => $id, 'status' => 'PAID'])->first();
				if ($check == null) {
					return redirect('/application-step2')->with('error', 'Pay application fee');
				}
				if ($applicant->status == 'verified' || $applicant->status == 'paid') {
					return redirect('/application-step3/' . $applicant->application_number);
				}
				return redirect()->route('applicant.home');
			}

			if($request->type == 'Postgraduate Applicant'){
				$applicant = Pgapplicant::where(['application_number' => $id])->first();
				if (!Hash::check($password, $applicant->password)) {
					return back()->with('error', 'Invalid login credentials!');
				}
				if ($applicant->status == null) {
					return back()->with('error', 'Verify Your Email Address!');
				}
				Session::put('pgapplicant', $applicant);
				$check = PgApplicationFee::where(['email' => $applicant->email, 'status' => 'PAID'])->first();
				if ($check == null) {
					return redirect('/pg-application-fee')->with('error', 'Pay application fee');
				}
				$step = $applicant->step;
				if($step == 3) {
					return redirect('/pg-application-step3/' . base64_encode($applicant->application_number));
				}else if($step == null){
					return redirect('/pg-application-fee');
				}else if($step !== 7){
					$new_step = intval($step) + 1;
					return redirect('/pg-application-step' . $new_step);
				}else{
					return redirect('/pg-application-form');
				}
				// return redirect()->route('applicant.home');
			}
			//use registration_number for everyone
			$data = StudentInfo::where('registration_number', $id)->first();
			// } else {
			// 	$data = StudentInfo::where('matric_number', $id)->first();
			// }

			if (!Hash::check($password, $data->password)) {
				return back()->with('error', 'Invalid login credentials!');
			}

			if ($data->status == null) {
				return back()->with('error', 'Verify Your Email Address!');
			}

			//dd($data, Session::get('student'));
			Session::put('student', $data);
			$student_id = $data['registration_number'];
			$student_type = $request->type == 'new' ? 'new' : 'returning';
			Session::put('student_id', $student_id);
			Session::put('student_type', $data->student_type);
			$curr_session = Helper::current_semester();
			$check = IctFee::where(['student_id' => $student_id, 'session_id' => $curr_session])->count();

			// if($check < 1){
			// 	return redirect()->route('student.ict');
			// }

			//new student attempting login but not paid acceptance fee
			if ($data->Payment_status != 'paid' && $request->type == 'new') {
				return redirect('/pay-acceptance-fee');
			}

			//new student acceptance fee verified, continue registration
			if ($data->Payment_status == 'paid' && $request->type == 'new' && $data->status == 'verified') {
				return redirect('/student-registration-form')->with('success', 'Complete your registration!');
			}

			//new student acceptance fee verified and HOD approved submitted registration form, Goto Dashboard
			if ($data->Payment_status == 'paid' && $request->type == 'new' && $data->status == 'saved') {
				return redirect('/student-registration-success');
			}

			if ($data->Payment_status == 'paid' && $request->type == 'new' && $data->status == 'approved') {
				return redirect()->route('student.home');
			}

			//
			//returning student 
			if ($data->status == "verified" || $data->status == null) {
				return redirect('student-registration-form');
			}
			if ($data->status !== 'approved') {
				return redirect('student-registration-success');
			}
			return redirect()->route('student.home');
			// return redirect('student-registration-success');


		}
		$programs = Program::all();
		return view('homepage.login', compact('programs'));
	}

	public function forgot_password(Request $request)
	{

		if ($request->isMethod('post')) {
			try {
				$std = StudentInfo::where(['Email_Address' => $request->email])->first();
				if (!$std) {
					$std = Applicant::where(['email' => $request->email])->first();
					if(!$std){
						return back()->with('error', 'This email is not tied to an account');
					}else{
						$otp = substr(uniqid(), -5);
						$std->otp = $otp;
						$std->save();
						Mail::to(urldecode($request->email))->send(new PasswordReset($otp));
						Session::put('email', $request->email);
						return redirect('/verify-otp')->with(['success' => 'An OTP has been sent to your email. Enter the OTP below to continue']);
					}
					
				} else {
					$otp = substr(uniqid(), -5);
					$std->otp = $otp;
					$std->save();
					Mail::to(urldecode($request->email))->send(new PasswordReset($otp));
					Session::put('email', $request->email);
					return redirect('/verify-otp')->with(['success' => 'An OTP has been sent to your email. Enter the OTP below to continue']);
				}
			} catch (\Exception $e) {
				return back()->with('error', 'An error occured, please try again later');
			}
		}
		return view('homepage.forgot_password');
	}

	public function verify_otp(Request $request)
	{
		if ($request->isMethod('post')) {
			$std = StudentInfo::where(['Email_Address' => $request->email, 'otp' => $request->otp])->first();
			if (!$std) {
				$std = Applicant::where(['email' => $request->email, 'otp' => $request->otp])->first();
				if(!$std){
					return back()->with('error', 'Invalid OTP');
				}
				return redirect('/reset-password');
				
			} else {
				return redirect('/reset-password');
			}
		}
		return view('homepage.verify_otp');
	}

	public function reset_password(Request $request)
	{
		if ($request->isMethod('post')) {
			if ($request->password !== $request->conf_password) {
				return back()->with('error', 'Password does not match');
			}
			$std = StudentInfo::where(['Email_Address' => $request->email])->first();
			if (!$std) {
				$std = Applicant::where(['email' => $request->email])->first();
				if(!$std){
					return back()->with('error', 'An error occured');
				}
				$std->otp = null;
				$std->password = Hash::make($request->password);
				$std->save();
				return redirect('/student-portal')->with(['success' => 'Login with your new password']);
			} else {
				$std->otp = null;
				$std->password = Hash::make($request->password);
				$std->save();
				return redirect('/student-portal')->with(['success' => 'Login with your new password']);
			}
		}
		return view('homepage.reset_password');
	}

	public function send_biodata_email()
	{
		$student_id = Session::get('student_id');
		$student__id = Session::get('student');
		$student = StudentInfo::find($student__id->id);
		$states = State::all();
		$department = Department::find($student->dept_id);
		$faculty = Faculty::find($student->faculty_id);
		$print = 1;
		// $viewhtml = View::make('emails.biodata', [$states, $department, $faculty, $student, $print])->render();
		// $dompdf = new Dompdf();
		// $dompdf->loadHtml($viewhtml);
		// $dompdf->setPaper('A4', 'landscape');
		// $dompdf->render();
		// // Output the generated PDF to Browser
		// $dompdf->stream();
		try {
			Mail::to($student->Email_Address)->send(new BiodataEmail($states, $department, $faculty, $student));
			return back()->with('success', 'Email Sent');
		} catch (\Exception $e) {
			return back()->with('error', $e->getMessage());
		}
		// if(){

		// }else{
		// 	return back()->with('error','An error occured');
		// }
		// return view('emails.biodata', compact('states', 'department', 'faculty', 'student'));
	}

	public function portal()
	{
		$categories = Category::where(['type' => 'menu'])->get();
		// dd($categories);
		return view('homepage.portal', compact('categories'));
	}

	public function contacts()
	{

		// dd($categories);
		return view('homepage.contacts');
	}

	public function contactSubmit(Request $request)
	{
		$this->validate($request, [
			'full_name' => 'required',
			'email' => 'required',
			'message' => 'required',
			'phone_number' => 'required',
		]);

		$request['body'] = $request['message'];

		Mail::to('support@imsu.edu.ng')->send(new ContactUsMail($request->all()));

		return back()->with('success', 'Message sent, we will get back to you as soon as possible');
	}

	public function get_lgas(Request $request)
	{
		$lgas = Lga::where(['state_id' => $request->state_id])->get();
		$resp['body'] = $lgas;
		return $resp;
	}

	public function get_departments(Request $request)
	{
		$options = Department::where(['faculty_id' => $request->faculty_id])->get();
		$resp['body'] = $options;
		return $resp;
	}

	public function get_programmes(Request $request)
	{
		$options = Programme::where(['dept_id' => $request->dept_id])->get();
		$resp['body'] = $options;
		return $resp;
	}

	public function get_specializations(Request $request)
	{
		$options = Specialization::where(['programme_id' => $request->programme_id])->get();
		$resp['body'] = $options;
		return $resp;
	}

	public function get_department_options(Request $request)
	{
		$options = DepartmentOption::where(['dept_id' => $request->dept_id])->get();
		$resp['body'] = $options;
		return $resp;
	}

	public function make_payment(Request $request){
		$sessions = Current_Semester_Running::all();
        $semesters = Semester::all();
        $fee_lists = FeeList::all();
        //   dd($sessions);
        return view('homepage.make_payment', compact('sessions', 'fee_lists', 'semesters'));
	}

	public function create_user(Request $request){
		$check = StudentInfo::where(['Email_Address' => $request->Email_Address])->count();
		if($check > 0){
			$save = StudentInfo::updateOrCreate(
				['Email_Address' => $request->Email_Address],
				[$request->all()]
			);
			
		}else{
			$save = StudentInfo::updateOrCreate(
				['Email_Address' => $request->Email_Address],
				[
					'password' => Hash::make('12345'),
					'temp_password' => '12345',
					'first_name' => $request->Full_name,
					'last_name' => $request->Full_name,
					"Full_name" => $request->Full_name,
					"Email_Address" => $request->Email_Address,
					"Student_Mobile_Number"=> $request->Student_Mobile_Number,
					"registration_number"=> $request->registration_number,
				]
			);
		}
		

		return $save;
	}

	public function success_payment(Request $request, $id){
		$check = FeeHistory::find(base64_decode($id));
		$student = StudentInfo::find($check->student_id);
		$fee = FeeList::find($check->fee_id);
		// dd($student);
		return view('homepage.success_payment', compact('check', 'student', 'fee'));
	}

	public function bank_payment_invoice(Request $request, $id){
		$check = FeeHistory::where(['reference_id' => $id])->first();
		$student = StudentInfo::find($check->student_id);
		$fee = FeeList::find($check->fee_id);

		return view('homepage.bank_invoice', compact('check', 'student', 'fee', 'id'));
	}

	

	public function portal_logout(Request $request){
		$request->session()->flush();
		return redirect('/student-portal')->with('success', 'Logged out successfully');
	}

	public function check_former_payment(Request $request){
		$std = StudentInfo::where(['Email_Address' => $request->Email_Address])->first();
		$check = FeeHistory::where(['student_id' => $std->id,  'fee_id' => $request->fee_id ,'status' => 'PAID'])->count();
		$fee = FeeList::find($request->fee_id);
		if($check > 0){
			$msg = "This student with email '" . $request->Email_Address . "' already paid for " . $fee->fee_name. ". Do you still want to make the same payment for this student? If no, kindly correct the email address";
			
		}else{
			$msg = 'Continue';
		}
		return $msg;
	}
}
