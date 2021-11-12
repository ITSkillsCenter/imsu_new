<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
  // Ignores notices and reports all other kinds... and warnings
  error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
  // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

//feedback
// Route::view('contact', 'frontend.contact.create')->name('contact');

Route::group(['prefix' => '2fa'], function () {
  Route::get('/', 'LoginSecurityController@show2faForm');
  Route::post('/generateSecret', 'LoginSecurityController@generate2faSecret')->name('generate2faSecret');
  Route::post('/enable2fa', 'LoginSecurityController@enable2fa')->name('enable2fa');
  Route::post('/disable2fa', 'LoginSecurityController@disable2fa')->name('disable2fa');

  // 2fa middleware
  Route::post('/2faVerify', function () {
    return redirect(URL()->previous());
  })->name('2faVerify')->middleware('2fa');
});

// test middleware
Route::get('/test_middleware', function () {
  return "2FA middleware work!";
})->middleware(['auth', '2fa']);

//Article
Route::get('article', 'ArticleController@index')->name('articles');
Route::get('article/{articleId}/{articleHeading?}', 'ArticleController@show')->name('get-article');
Route::get('category/article/{categoryAlias}', 'CategoryController@getArticles')->name('articles-by-category');
Route::get('keyword/article/{keywordName}', 'KeywordController@getArticles')->name('articles-by-keyword');
Route::get('search', 'ArticleController@search')->name('search-article');

//Comment
Route::post('comment/{articleId}', 'CommentController@store')->name('add-comment');
Route::get('comment/{commentId}/confirm', 'CommentController@confirmComment')->name('confirm-comment');

//Category
Route::get('category/{categoryId}', 'CategoryController@show')->name('get-category');

Route::group(['prefix' => '/admin', 'middleware' => ['2fa', 'auth']], function () {
  Route::get('/home', 'HomeController@index')->name('admin.home');
  /*
  ########## Student information Route ###########
  */
  //admin articles
  Route::get('article', 'ArticleController@adminArticles')->name('admin-articles');
  Route::get('article/toggle-publish/{articleID}', 'ArticleController@togglePublish')->name('toggle-article-publish');
  Route::get('article/{articleId}/delete', 'ArticleController@destroy')->name('delete-article');
  Route::get('article/create', 'ArticleController@create')->name('create-article');
  Route::post('article', 'ArticleController@store')->name('store-article');
  Route::get('article/{articleId}/edit', 'ArticleController@edit')->name('edit-article');
  Route::post('article/{articleId}', 'ArticleController@update')->name('update-article');

  //Admin comments
  Route::get('comment', 'CommentController@index')->name('comments');
  Route::get('comment/{commentId}/delete', 'CommentController@destroy')->name('delete-comment');
  Route::get('comment/toggle-publish/{commentId}', 'CommentController@togglePublish')
    ->name('toggle-comment-publish');
  Route::put('comment/{commentId}', 'CommentController@update')->name('update-comment');

  //Admin feedback
  Route::get('feedback', 'FeedbackController@index')->name('feedbacks');
  Route::get('feedback/toggle-resolved/{feedbackId}', 'FeedbackController@toggleResolved')
    ->name('toggle-feedback-resolved');
  Route::get('feedback/close/{feedbackId}', 'FeedbackController@close')->name('close-feedback');

  //admin category
  Route::get('category', 'CategoryController@index')->name('categories');
  Route::get('category/toggle-active/{categoryId}', 'CategoryController@toggleActive')
    ->name('toggle-category-active');
  Route::put('category/{categoryId}', 'CategoryController@update')->name('update-category');
  Route::post('category', 'CategoryController@store')->name('add-category');
  Route::get('category/{categoryId}/delete', 'CategoryController@destroy')->name('delete-category');
  Route::get('payment-gateways/settings', 'CategoryController@destroy')->name('payment_settings');

  Route::get('/view-scholarship-application/{id}', 'StudentInfoController@view_scholarship')->name('studentinfo.view_scholarship');
  Route::post('/view-scholarship-application/{id}', 'StudentInfoController@view_scholarship')->name('studentinfo.view_scholarship');

  Route::get('/resend_email/{id}', 'StudentInfoController@resend_email');

  Route::get('/studentinfo/find/{type}', 'StudentInfoController@find')->name('studentinfo.find');
  Route::get('/studentinfo/delete/{id}', 'StudentInfoController@delete')->name('studentinfo.delete');
  Route::get('/studentinfo/view/{id}', 'StudentInfoController@edit')->name('studentinfo.edit');
  Route::post('/studentinfo/view/{id}', 'StudentInfoController@edit')->name('studentinfo.edit');
  Route::get('/studentinfo/verify/{id}', 'StudentInfoController@verify')->name('studentinfo.verify');
  Route::get('/studentinfo/scholarships', 'StudentInfoController@scholarship')->name('studentinfo.scholarship');
  Route::get('/studentinfo/scholarships/{dept_id}/{level}', 'StudentInfoController@scholarship')->name('studentinfo.dept_scholarship');
  Route::get('/print_slip/{dept}/{level}', 'StudentInfoController@print_slip')->name('studentinfo.print_slip');
  Route::post('/studentinfo/create', 'StudentInfoController@store')->name('studentinfo.create');
  Route::resource('/studentinfo', 'StudentInfoController');

  Route::get('/student_year', 'StudentInfoController@student_year')->name('studentinfo.student_year');
  Route::post('/student_year', 'StudentInfoController@student_year')->name('studentinfo.student_year');

  Route::get('/general-settings', 'SettingsController@general_settings');
  Route::post('/general-settings', 'SettingsController@general_settings');

  Route::post('/studentview', 'StudentInfoController@studentview')->name('student.view');
  Route::get('/studentview/{id}', 'StudentInfoController@studentDownload')->name('studentinfo.download');
  Route::post('/students-dept-status', 'StudentInfoController@dept_current_view')->name('students.status');
  Route::post('/students-dept-level', 'StudentInfoController@dept_level_view')->name('students.level');
  Route::get('/approve/{dept_id}/{level}', 'StudentInfoController@approve_student');
  Route::post('/reject_student', 'StudentInfoController@reject_student');
  Route::get('/view_student/{student_id}', 'StudentInfoController@view_student');
  Route::get('/approve/{dept_id}/{level}/{student_id}', 'StudentInfoController@approve_student');
  Route::post('/approve/{dept_id}/{level}', 'StudentInfoController@approve_student');
  Route::get('/export', 'StudentinfoExportImportController@exportform')->name('student.exportform');

  //jamb upload
  Route::get('/import-jamb-students', 'StudentinfoExportImportController@importjamb')->name('student.importjamb');
  Route::post('/import-jamb-students', 'StudentinfoExportImportController@importjamb')->name('student.importjamb');
  Route::post('/import-jamb-de', 'StudentinfoExportImportController@importDe')->name('student.importde');

  Route::get('/view-applicants', 'StudentinfoExportImportController@viewjamb')->name('student.viewjamb');
  Route::post('/view-applicants', 'StudentinfoExportImportController@viewjamb')->name('student.viewjamb');

  Route::get('/view-applicant/{id}', 'StudentInfoController@view_applicant');

  Route::get('/id-management', 'StudentInfoController@id_management');
  Route::get('/staff-id-management', 'StudentInfoController@staff_id_management')->name('staff.idcard');
  Route::get('/exam-attendance', 'AttendanceController@exam_attendance');
  Route::post('/exam-attendance', 'AttendanceController@exam_attendance');
  Route::get('/mark-attendance/{session}/{semester}/{level}/{course}', 'AttendanceController@mark_attendance');
  Route::post('/mark-attendance/{session}/{semester}/{level}/{course}', 'AttendanceController@mark_attendance');
  Route::post('/view-id-management-bulk', 'StudentInfoController@view_id_management_bulk');
  Route::get('/view-id-management-bulk', 'StudentInfoController@view_id_management_bulk');
  Route::get('/view_student_id/{id}', 'StudentInfoController@view_id_management');
  Route::get('/view_staff_id/{id}', 'StudentInfoController@view_staff_id_management');

  //Admissin=on
  Route::get('/manage-admission', 'StudentInfoController@manage_admission')->name('student.manage_admission');

  Route::get('/mat', 'StudentMatricGeneratorController@mat');


  // ######################### GENERATE STUDENT  MATRIC  NUMBER ##################
  Route::get('/matric-number', 'StudentMatricGeneratorController@index')->name('student.matricno');
  Route::post('/generte-matric-num', 'StudentMatricGeneratorController@generate_matric_num')->name('student.matric.gen');
  Route::post('/matric-num', 'StudentMatricGeneratorController@get_student_by_year_or_dept_level')->name('student.matric.num');
  Route::get('/matric-num/{id}/{yr}', 'StudentMatricGeneratorController@get_single_student');

  // ######################### GENERATE STUDENT  MATRIC  NUMBER ENDS ##################

  Route::post('/export', 'StudentinfoExportImportController@exportform');
  Route::get('studentinfo-all-info', 'StudentInfoController@export_all')->name('student.all_export');
  Route::post('studentinfo/import_std', 'ImportStudentController@import_st')->name('student.import');
  Route::get('studentreport/{dept}', 'StudentInfoReportController@report_dept')->name('student.report_dept');
  Route::post('studentinfo/download/', 'StudentinfoExportImportController@export_std')->name('studentinfo.export');
  Route::get('studentreport/{dept}/{status}', 'StudentInfoReportController@report_dept_status')->name('student.report_dept_status');

  Route::get('/approve_acceptance/{student_id}', 'StudentInfoController@approve_acceptance');
  Route::get('/approve_acceptance', 'StudentInfoController@approve_acceptance');
  Route::post('/approve_acceptance', 'StudentInfoController@approve_acceptance');
  Route::post('/reject_acceptance', 'StudentInfoController@reject_acceptance');

  /* ################# Registration  Section ##################*/
  Route::get('all-registered-list', 'RegistrationController@index')->name('registration.index');
  Route::get('department-registered/{dept}', 'RegistrationController@department_reg')->name('registration.department_reg');
  Route::get('semester-registered/{dept}/{semester}', 'RegistrationController@semester_reg')->name('registration.semester_reg');
  //Registration Clearance
  Route::get('registration-clearance/{id}', 'RegistrationController@clearance')->name('registration.clearance');
  Route::get('registration-department', 'RegistrationController@department')->name('department.clearance');
  Route::post('registration-department', 'RegistrationController@department_clear')->name('department.clearance');
  Route::get('registration-hostel', 'RegistrationController@hostel')->name('hostel.clearance');
  Route::post('registration-hostel', 'RegistrationController@hostel_clear')->name('hostel.clearance');
  Route::get('registration-account', 'RegistrationController@account')->name('account.clearance');
  Route::post('registration-account', 'RegistrationController@account_clear')->name('account.clearance');

  // Registration CRUD
  Route::post('manual-registration', 'RegistrationController@manual_reg')->name('manual.registration');
  Route::get('registration-edit/{student_id}/{semester}/{type}', 'RegistrationController@edit')->name('registration.edit');
  Route::get('registration-delete/{student_id}/{semester}/{type}', 'RegistrationController@delete')->name('registration.delete');
  Route::match(['put', 'patch'], 'registration-type-update/{student_id}/{semester}/{type}', 'RegistrationController@reg_type_update')->name('registration.reg_type_update');



  Route::get('registration-details/{student_id}/{semester}/{type}', 'RegistrationController@details')->name('registration.details');
  Route::get('registration-download/{student_id}/{semester}/{type}', 'RegistrationController@download')->name('registration.download');
  Route::get('registration-dept-details/{dept}/{semester}/{type}', 'RegistrationController@details_dept')->name('registration.details_dept');
  Route::get('registered-course-wise', 'RegistrationController@courseReport')->name('registration.course');
  Route::post('registered-course-wise', 'RegistrationController@courseReportFind')->name('registration.course');

  Route::get('not-registered-yet', 'RegistrationController@notRegistered')->name('registration.notyet');
  Route::post('not-registered-yet', 'RegistrationController@notRegisteredFind')->name('registration.notyet');

  Route::post('add-course', 'RegistrationController@addCourseReg')->name('course.add_registration');
  Route::get('delete-course/{id}', 'RegistrationController@deleteCourseReg')->name('course.delete_registration');


  /* ################# Clearance Receivable  Section ##################*/
  Route::get('department_clear/{id}', 'RegistrationController@department_clear')->name('registration.department_clear');


  /* ################# Clearance Report  Section ##################*/
  Route::get('student-clearance', 'StudentClearanceController@index')->name('clear_report.index');
  Route::get('student-clearance/{type}', 'StudentClearanceController@clearance_type')->name('clear_report.type');
  Route::get('student-cr_hall', 'StudentClearanceController@hall')->name('cr_hall.hall');
  Route::get('student-cr_transport', 'StudentClearanceController@cr_transport')->name('cr_transport.clearance');
  Route::get('student-cr_canteen', 'StudentClearanceController@cr_canteen')->name('cr_canteen.clearance');
  Route::get('student-cr_library', 'StudentClearanceController@cr_library')->name('cr_library.clearance');
  Route::get('student-cr_treasurer', 'StudentClearanceController@cr_treasurer')->name('cr_treasurer.clearance');
  Route::get('student-cr_treasurer/{type}', 'StudentClearanceController@cr_treasurer_type')->name('cr_treasurer.type');
  Route::post('student-cr_treasurer', 'StudentClearanceController@treasurer')->name('treasurer.clearance');
  Route::get('student-cr_department', 'StudentClearanceController@cr_department')->name('cr_department.clearance');
  Route::get('all-clearance/{id}', 'StudentClearanceController@clearance')->name('all.clearance');
  Route::get('report-clearance/{id}', 'StudentClearanceController@report')->name('report.clearance');
  Route::get('clear-report/{dept}', 'StudentClearanceController@report_dept_treasurer')->name('clear.report_dept_treasurer');
  Route::get('registration_clearance', 'StudentClearanceController@regClear')->name('clear.registration_clearance');
  Route::get('registration_paid/{id}', 'StudentClearanceController@regClearPaid')->name('clear.registration_paid');

  /* ################# Attendance  Section ##################*/
  //Route::resource('attendance','AttendanceController');
  Route::post('attendance/Create', 'AttendanceController@Create')->name('attendance.view');
  // Route::post('attendance','AttendanceController@Store')->name('attendance.store');

  // Route::get('attendance','AttendanceController@index')->name('attendance.index');
  Route::post('attendance/by-subject', 'AttendanceController@index2')->name('attendance.index2');

  //Route::get('students/{dID}/{semester}','AttendanceController@StudentList')->name('students.list');
  Route::get('/attendance/list', 'AttendanceController@list')->name('attendance.list');
  Route::get('/attendance/report', 'AttendanceController@report')->name('attendance.report');
  Route::post('/attendance/report', 'AttendanceController@reportDetails')->name('attendance.report');
  Route::post('/attendance/report-student', 'AttendanceController@reportStudent')->name('attendance.student');
  //Route::post('attendance/','AttendanceController@update')->name('attendance.update');
  Route::resource('attendance', 'AttendanceController');
  /*
  ########## Course version  information Route ###########
  */
  Route::resource('/cversion', 'CversionController');
  /*
  ########## Faculty information Route ###########
  */
  Route::get('faculty-delete/{id}', 'FacultyController@destroy')->name('faculty.destroy');
  Route::resource('/faculty', 'FacultyController')->except('destroy');
  Route::get('/faculty-assign', 'FacultyAssignController@index')->name('faculty.assign');


  /*
  ########## Class routine information Route ###########
  */
  Route::resource('/croutine', 'CroutineController');
  /*
  ########## Course information Route ###########
  */
  Route::get('syllabus', 'CourseController@syllabus')->name('course.syllabus');
  Route::get('syllabus/department/{department}', 'CourseController@syllabus_dept')->name('syllabus.dept');
  Route::get('syllabus/department/{department}/session/{session}', 'CourseController@syllabus_dept_session')->name('syllabus.session');
  Route::get('syllabus/department/{department}/session/{session}/level_term/{level_term}', 'CourseController@syllabus_dept_session_level')->name('syllabus.level');
  Route::post('syllabus', 'CourseController@syllabus_post')->name('syllabus.post');
  Route::get('syllabus-edit/{id}', 'CourseController@syllabus_edit')->name('syllabus.edit');
  Route::match(['put', 'patch'], 'syllabus-update/{id}', 'CourseController@syllabus_update')->name('syllabus.update');
  Route::get('syllabus-delete/{id}', 'CourseController@syllabus_delete')->name('syllabus.delete');
  Route::post('syllabus-import', 'CourseController@syllabus_import')->name('syllabus.import');

  Route::get('/courses/{dept}', 'CourseController@department')->name('course.department');
  Route::post('/course/edit/{id}', 'CourseController@update')->name('course.update');
  Route::post('/course/index', 'CourseController@index')->name('course.index');
  Route::post('/course/index/{id}', 'CourseController@index');
  Route::get('/course/index/{id}', 'CourseController@index');
  Route::get('/course/index', 'CourseController@index');
  Route::get('/course/edit/{id}', 'CourseController@edit')->name('course.edit');
  Route::delete('/course/destroy/{id}', 'CourseController@destroy');
  Route::get('/course/create', 'CourseController@create')->name('course.create');
  Route::post('/course/store', 'CourseController@store')->name('course.store');
  Route::delete('/course/{id}', 'CourseController@destroy')->name('course.destroy');
  Route::get('subject/{deparment}/{semester}', ['as' => 'subject.DeptAndSem', 'uses' => 'CourseController@subjetsByDptSem']);
  Route::get('subject/{deparment}', ['as' => 'subject.DeptAndSem', 'uses' => 'CourseController@subjetsByDpt']);

  Route::post('/course/carry-over', 'CourseController@carryover')->name('course.carryover');
  Route::get('/course/carry-over', 'CourseController@carryover')->name('course.carryover');

  Route::get('course/view-carry-over/{matric}', 'CourseController@view_student_carryover');

  Route::get('/approve-carryover-course/{cid}', 'CourseController@approve_student_carryover');
  Route::get('/reject-carryover-course/{cid}', 'CourseController@reject_student_carryover');

  /** Online class routes **/
  Route::get('online-class-delete/{class_id}', 'Online_Class_Controller@destroy')->name('online-class.destroy');
  Route::resource('online-class', 'Online_Class_Controller')->except('destroy');
  Route::get('online-class-all', 'Online_Class_Controller@all_classes')->name('online_class.all');
  Route::post('online-class-search', 'Online_Class_Controller@classes_search')->name('online_class.search');
  /*
  ########## Marks information Route ###########
  */

  Route::resource('/mark', 'MarkController');

  Route::resource('/archive', 'ArchiveController');


  Route::post('/mark-student', 'MarkController@Student')->name('mark.student');
  Route::get('/mark-sheet', 'MarkController@marksheet')->name('mark.sheet');
  Route::post('/mark-sheet', 'MarkController@single_marksheet')->name('mark.sheet');
  Route::get('/mark-semester', 'MarkController@semester')->name('mark.semester');
  Route::post('/mark-semester', 'MarkController@semester_marksheet')->name('mark.semester');
  Route::get('/mark-upload', 'ImportMarkController@upload')->name('mark.upload');
  Route::post('/mark-import', 'ImportMarkController@import_mark')->name('mark.import_mark');
  Route::post('/result-import', 'ImportMarkController@import_result')->name('result.import_result');
  Route::get('/academic-transcript', 'AcademicTranscriptController@show')->name('transcript.show');
  //Route::post('/academic-transcript','AcademicTranscriptController@transcript')->name('transcript.view');
  Route::post('/academic-transcript', 'AcademicTranscriptController@new_transcript')->name('transcript.view');

  Route::get('/student-result', 'ResultController@index')->name('result.index');
  Route::post('/student-result', 'ResultController@list')->name('result.list');

  /*
  ########## Credit Transfer Transcript  ###########  
  */
  Route::resource('/transfer', 'TransferedStudentController');
  Route::resource('/waived', 'WaivedCourseController');
  Route::get('/transfer-transcript', 'CreditTransferTranscript@show')->name('transfer.transcript');
  Route::post('/transfer-transcript', 'CreditTransferTranscript@new_transcript')->name('transfer.view');

  /*
  ########## Admit card  Route ###########
  */
  Route::get('/admit-card', 'AdmitcardController@index')->name('admit.view');
  Route::get('/admit-card/{dep}/{level}', 'AdmitcardController@depLevel');
  Route::post('/admit-download', 'AdmitcardController@download')->name('admit.download');

  Route::resource('user', 'UserController');
  Route::get('/program', 'ProgramsController@index')->name('programs.index');
  Route::post('/program', 'ProgramsController@store')->name('programs.store');
  Route::post('/program/{id}', 'ProgramsController@update')->name('programs.update');
  Route::get('/program/create', 'ProgramsController@create')->name('programs.create');
  Route::get('/program/edit/{id}', 'ProgramsController@edit')->name('programs.edit');
  Route::match(['put', 'patch'], 'role-update/{id}', 'UserController@role_update')->name('user.assign_roles');
  Route::resource('role', 'RoleController');
  Route::resource('permission', 'PermissionController');
  Route::get('/settings', ['as' => 'user.settings', 'uses' => 'UserController@settings']);
  Route::post('/settings', ['as' => 'user.settings', 'uses' => 'UserController@postSettings']);
  /** Settings controller */
  // laravel audit
  Route::get('all-activities', 'AuditController@index')->name('activity.audit')->middleware('auth');
  // current semester CRUD
  Route::get('current-semester-running/delete/{id}', 'Current_Semester_Controller@destroy')->name('current-semester-running.destroy');
  Route::resource('current-semester-running', 'Current_Semester_Controller')->except('destroy');
  /** Departments */
  Route::get('departments/delete/{id}', 'Department_Controller@destroy')->name('departments.destroy');
  Route::resource('departments', 'Department_Controller')->except('destroy');
  // Route::resource('program', 'ProgramsController')->except('destroy');
  Route::get('programs/delete/{id}', 'ProgramsController@destroy')->name('programs.destroy');
  // Event Types
  Route::get('event-types/delete/{id}', 'EventTypeController@destroy')->name('event-types.destroy');
  Route::resource('event-types', 'EventTypeController')->except('destroy');
  // semester events
  Route::get('semester-event/{session_id}', 'EventController@index')->name('semester-event.index');
  Route::get('semester-delete/{event_id}', 'EventController@destroy')->name('semester-event.delete');
  Route::resource('semester-event', 'EventController')->except('index', 'destroy');
});

/*
########## Admin student promotion route ###########
 */
Route::group(['prefix' => '/admin', 'middleware' => 'auth', 'namespace' => 'teachers_evaluation_admin'], function () {
  /*** Teacher evaluation Section admin part*/
  /** Question Category */
  Route::get('teacher-evaluation-qc/delete/{id}', 'TE_Question_Category_Controller@destroy')->name('teacher-evaluation-qc.destroy');
  Route::resource('teacher-evaluation-qc', 'TE_Question_Category_Controller')->except('destroy');
  /** Question */
  Route::get('teacher-evaluation-qs/{id}', 'TE_Question_Controller@index')->name('teacher-evaluation-qs.index');
  Route::get('teacher-evaluation-qs/delete/{id}', 'TE_Question_Controller@destroy')->name('teacher-evaluation-qs.destroy');
  Route::resource('teacher-evaluation-qs', 'TE_Question_Controller')->except('index', 'destroy');
  /** Report */
  Route::get('teacher-evaluation-report', 'TE_Report_Controller@index')->name('teacher-evaluation-report.index');
  // semester wise filter
  Route::get('teacher-evaluation-report/semester/{id}', 'TE_Report_Controller@semester')->name('teacher-evaluation-report.semester');
  // fetching faculties according to department and semester
  Route::get('teacher-evaluation-report/department/{dept}/semester/{sem}', 'TE_Report_Controller@faculty_list')->name('teacher-evaluation-report.faculties');
  // generating reports according to faculty,department,semester
  Route::get('teacher-evaluation-report-generate/semester/{sem}/faculty/{fac}/course/{crs}', 'TE_Report_Controller@report')->name('teacher-evaluation-report.report');
  // not evaluated student list (semester and department wise)
  Route::get('teacher-not-evaluation-report', 'TE_Report_Controller@not_evaluated_index')->name('teacher-not-evaluation-report.index');
  Route::post('teacher-not-evaluation-report-search', 'TE_Report_Controller@not_evaluated_search')->name('teacher-not-evaluation-report.search');
});

Route::group(['prefix' => '/admin', 'middleware' => 'auth', 'namespace' => 'admin_student'], function () {
  Route::get('/student-promotion', ['as' => 'student.promotion', 'uses' => 'StudentPromotionController@index']);
  Route::get('/student-admission', ['as' => 'student.admission', 'uses' => 'StudentPromotionController@admission']);
  Route::post('/student-promotion', ['as' => 'promotion.list', 'uses' => 'StudentPromotionController@promotionList']);
  Route::post('/student-update', ['as' => 'promotion.update', 'uses' => 'StudentPromotionController@promotionUpdate']);
});
/*
########## Accounting  Route ###########
 */
Route::group(['prefix' => '/admin', 'middleware' => 'auth', 'namespace' => 'Accounting'], function () {
  Route::resource('/feelist', 'FeeListController');
  Route::post('/feelist/{id}', 'FeeListController@edit');
  Route::resource('/fee', 'FeeController');
  Route::resource('/ledger', 'LedgerController');
  Route::resource('/chart_account', 'ChartAccountController');
  Route::get('/ledger-report', 'LedgerController@index2')->name('ledger.index2');
  Route::post('/ledger-report', 'LedgerController@indexReport')->name('ledger.indexReport');
  Route::get('/ledger-delete/{id}', 'LedgerController@delete')->name('ledger.delete');
  Route::get('/student-ledger/{id}', 'LedgerController@studentLedger')->name('student.ledger');
  Route::get('/student-journal/{id}', 'LedgerController@studentJournal')->name('student.journal');


  Route::get('receivable', 'ReceivableController@receivable')->name('account.receivable');
  Route::get('create-invoice', 'ReceivableController@create_invoice')->name('account.create_invoice');
  Route::post('create-invoice', 'ReceivableController@create_invoice');
  Route::post('/get_department_fees', 'ReceivableController@get_department_fees');
  Route::get('/view_payment_details/{id}', 'ReceivableController@view_payment_details');
  Route::post('/view_payment_details', 'ReceivableController@view_payment_details');
  Route::get('/view_admission_payment_details', 'ReceivableController@view_admission_payment_details');
  Route::post('/view_admission_payment_details', 'ReceivableController@view_admission_payment_details');


  Route::post('approve_school_fees', 'ReceivableController@approve_school_fees');
  Route::get('receivable-all', 'ReceivableController@receivable_all')->name('all.receivable');
  Route::get('verify-receivable', 'ReceivableController@verify_receivable')->name('verify.receivable');
  Route::get('receivable/{id}', 'ReceivableController@show')->name('receivable.show');
  Route::get('receivable/department/{department}', 'ReceivableController@receivable_dept')->name('receivable.dept');
  Route::get('receivable/department/{department}/chart_account_id/{id}', 'ReceivableController@receivable_dept_account')->name('receivable.dept_account');

  Route::get('receivable/department/{department}/batch/{session}', 'ReceivableController@receivable_dept_batch')->name('receivable.batch');
  Route::get('receivable/department/{department}/session/{session}', 'ReceivableController@receivable_dept_session')->name('receivable.session');

  Route::get('receivable/department/{department}/session/{session}/level_term/{level_term}', 'ReceivableController@receivable_dept_session_level')->name('receivable.level');
});

/*
########## Student Admin Panel Route ###########
 */
Route::group(['namespace' => 'student'], function () {
  Route::get('/student-login', 'StudentLoginController@login_show');
  Route::post('/student-login', 'StudentLoginController@login');
  Route::post('/student-password-reset-otp', 'StudentLoginController@send_otp')->name('otp.send');
  Route::post('/student-password-update', 'StudentLoginController@passwordUpdate')->name('pass.update');
});
Route::group(['namespace' => 'student', 'middleware' => 'student'], function () {
  Route::get('/student-logout', 'StudentLoginController@logout');
  Route::get('/student-home', 'StudentHomeController@home')->name('student.home');
  Route::get('/student-profile', 'StudentHomeController@profile');
  Route::get('/profile/edit', 'StudentHomeController@edit_profile');
  Route::post('/profile/edit', 'StudentHomeController@edit_profile');
  Route::get('/student-result', 'StudentResultController@result');
  Route::get('/student-course', 'StudentCourseController@course');
  Route::get('/student-course/{id}', 'StudentCourseController@course_fillter');


  Route::get('/generate-exam-pass', 'StudentCourseController@select_exam_pass');
  Route::post('/generate-exam-pass', 'StudentCourseController@select_exam_pass');

  Route::post('/show-exam-pass/{session}/{semester}/{level}', 'StudentCourseController@generate_exam_pass');
  Route::get('/show-exam-pass/{session}/{semester}/{level}', 'StudentCourseController@generate_exam_pass');
  Route::get('/remove-course/{id}', 'StudentCourseController@remove_course');


  Route::get('/course-registration', 'StudentCourseController@course_reg');
  Route::post('/course-registration', 'StudentCourseController@course_reg');
  Route::post('/show-reg/{session}/{semester}/{level}', 'StudentCourseController@view_reg');
  Route::get('/show-reg/{session}/{semester}/{level}', 'StudentCourseController@view_reg');
  // Route::get('/show-reg', 'StudentCourseController@view_reg');
  Route::get('/select-registration', 'StudentCourseController@select_course_reg');
  Route::post('/select-registration', 'StudentCourseController@select_course_reg');

  Route::get('/show-selected-reg/{session}/{semester}/{level}', 'StudentCourseController@view_selected_reg');
  Route::post('/show-selected-reg/{session}/{semester}/{level}', 'StudentCourseController@view_selected_reg');

  Route::get('/apply-for-carry-over', 'StudentCourseController@apply_carry_over');
  Route::post('/apply-for-carry-over', 'StudentCourseController@apply_carry_over');
  Route::get('/add-carryover-course/{cid}', 'StudentCourseController@apply_carry_over_course');
  Route::get('/remove-carryover-course/{cid}', 'StudentCourseController@remove_carry_over_course');


  Route::post('/reg-course', 'StudentCourseController@reg_course');

  Route::get('/student-attendance', 'StudentAttendanceController@index');
  Route::get('/student-attendance/{id}', 'StudentAttendanceController@report');
  // Student Admit Card Download

  Route::get('/student-admit', 'StudentAttendanceController@admit');
  Route::get('/student-admit/{id}', 'StudentAttendanceController@download');



  Route::get('/student-registration', 'StudentRegistrationController@index')->name('student.registration');
  Route::get('/student-registration/type/{id}', 'StudentRegistrationController@type')->name('student.registration_type');

  Route::get('/student-show_registration', 'StudentRegistrationController@show_reg')->name('check.registration');
  Route::get('/student-show_registration/{semester}/{type}', 'StudentRegistrationController@show_list')->name('show.registration');
  Route::post('/student-registration', 'StudentRegistrationController@store')->name('student.registration');
  Route::post('/student-registration-preview', 'StudentRegistrationController@reg_preview')->name('registration.preview');
  Route::get('/profile-settings', 'StudentSettingController@index');
  Route::post('/profile-settings', 'StudentSettingController@passwordChange')->name('student.password');
  Route::get('/profile-update', 'StudentSettingController@edit');
  Route::post('/profile-update', 'StudentSettingController@updatepro')->name('student.update');

  Route::get('/student-result', 'StudentResultController@show_result')->name('student.show_result');
  Route::get('/student-result/{sem}', 'StudentResultController@result');

  Route::get('/student-payment', 'PaymentController@index');
  Route::post('/student-payment', 'PaymentController@index');
  Route::get('/student-payment/pay/{invoice_id}', 'PaymentController@payment_page');
  Route::post('/student-payment/pay/{invoice_id}', 'PaymentController@payment_page');
  Route::get('/student-payment/view/{invoice_id}', 'PaymentController@view_invoice');
  Route::post('/update_payment_details', 'PaymentController@update_payment_details');
  Route::post('/save_payment_details', 'PaymentController@save_payment_details');
  Route::post('/generate-invoice', 'PaymentController@generate_invoice');
  Route::get('/cancel-invoice/{inv}', 'PaymentController@cancel_invoice');


  Route::get('/payment-total', 'PaymentController@totalPaid');
  Route::get('/student-payment/{semester}/{reg}/{level}', 'PaymentController@paymentView')->name('student.payment');
  Route::get('/student-payment-slip', 'PaymentController@payment_slip')->name('student.receipt');
  Route::get('/student-fee', 'PaymentController@ssl_payment')->name('ssl.payment');
  Route::get('/student-online', 'PaymentController@stripe_payment')->name('stripe.payment');
  Route::post('/student-online', 'PaymentController@stripe_success')->name('stripe.success');
  Route::post('/student-fee', 'PaymentController@payment');
  Route::get('/success', 'PaymentController@success');
  Route::get('/fail', 'PaymentController@fail');
  Route::get('/cancel', 'PaymentController@cancel');

  /** Student Teacher Evaluation */
  Route::get('student-teacher-evaluation/session/{session_id}/course/{course_id}', 'TeacherEvaluationController@create')->name('student-teacher-evaluation.create');
  Route::resource('student-teacher-evaluation', 'TeacherEvaluationController')->except('create');
  /** Online Class */
  Route::get('student-online-class-index', 'Online_Class_Controller@index')->name('student-online-class.index');
  Route::post('student-online-class-search', 'Online_Class_Controller@search')->name('student-online-class.search');
});

Route::group(['middleware' => 'studentreg'], function () {
  Route::get('/registration-fee', 'StudentRegController@ict_fee')->name('student.ict');
  Route::get('/invoice', function () {
    return view('emails.account_created');
  });

  Route::post('/save_ict_payment', 'StudentRegController@save_ict_payment');
  Route::get('/student-registration-form', 'StudentRegController@student_registration_form');
  Route::post('/student-registration-form', 'StudentRegController@student_registration_form');
  Route::get('/student-registration-form/preview', 'StudentRegController@preview')->name('student.preview');
  Route::get('/student-registration-success', 'StudentRegController@preview_success');
  Route::get('/upload_csv', 'StudentRegController@upload_csv');
  Route::post('/upload_csv', 'StudentRegController@upload_csv');
});

Route::group(['namespace' => 'applicant', 'middleware' => 'verified_applicant'], function () {
  Route::get('/applicant-home', 'ApplicantController@home')->name('applicant.home');
});

//default route uses both admin panel
Route::get('admin/add/{division}', ['as' => 'admin.division', 'uses' => 'AddressController@addressByDivision']);
Route::get('admin2/add/{district}', ['as' => 'admin.district', 'uses' => 'AddressController@addressByDistrict']);
Route::get('admin3/add/{upazila}', ['as' => 'admin.upazila', 'uses' => 'AddressController@addressByUpazila']);



Route::get('/portal-login', function () {
  // return "Server Under Maintenance";
  return view('main');
})->name('base_url');

Route::group(['namespace' => 'student'], function () {
  Route::post('/save_application_fee', 'PaymentController@save_application_fee');
  Route::post('/save_application_fee_interswitch', 'PaymentController@save_application_fee_interswitch');
});


Route::get('/', 'HomeController@homepage');
Route::get('/post-graduate', 'HomeController@pghome');
Route::get('/scholarship-application', 'HomeController@scholarship_application');
Route::post('/scholarship-application', 'HomeController@scholarship_application');
Route::get('/scholarship', 'HomeController@scholarships');
Route::get('/student_registration', 'HomeController@registration');
Route::post('/student_registration', 'HomeController@registration');
Route::get('/student-portal', 'HomeController@login');
Route::get('/forgot-password', 'HomeController@forgot_password');
Route::post('/forgot-password', 'HomeController@forgot_password');
Route::get('/verify-otp', 'HomeController@verify_otp');
Route::post('/verify-otp', 'HomeController@verify_otp');
Route::post('/reset-password', 'HomeController@reset_password');
Route::get('/reset-password', 'HomeController@reset_password');


Route::get('/sett', 'HomeController@sett');
Route::get('/student-portal-registration', 'HomeController@registration');
Route::get('/registration-steps', 'HomeController@registration_steps');
Route::post('/student-portal-registration', 'HomeController@registration');
Route::get('/faculty/{slug}', 'HomeController@get_faculty');
Route::post('/faculty/{slug}', 'HomeController@faculties');
Route::post('/student-portal', 'HomeController@login');
Route::get('/portal', 'HomeController@portal');
Route::get('/contacts', 'HomeController@contacts')->name('contacts');
Route::post('/contacts', 'HomeController@contactSubmit')->name('contact.submit');
Route::get('/admission-portal', 'HomeController@admission_portal');
Route::get('/student-portal-home', 'HomeController@student_portal');
Route::get('/staff-portal-home', 'HomeController@staff_portal');
Route::get('/alumni-portal-home', 'HomeController@alumni_portal');
Route::post('/get_lgas', 'HomeController@get_lgas');
Route::post('/get_departments', 'HomeController@get_departments');
Route::get('/admission/verify/{email}', 'HomeController@admission_verify');
Route::get('/verify/{email}', 'HomeController@verify');
Route::post('/get_department_options', 'HomeController@get_department_options');
Route::get('/send-biodata-email', 'HomeController@send_biodata_email');
Route::get('/pay-acceptance-fee', 'HomeController@pay_acceptance_fee');
Route::post('/pay-acceptance-fee', 'HomeController@pay_acceptance_fee');
Route::get('/faq', 'HomeController@faq');
Route::get('/admission-application', 'HomeController@admission_application');
Route::post('/admission-application', 'HomeController@admission_application');
Route::get('/admission-instruction', 'HomeController@admission_instruction');
Route::get('/application-step1', 'HomeController@application_step1');
Route::post('/application-step1', 'HomeController@application_step1');
Route::get('/application-step2', 'HomeController@application_step2');
Route::get('/application-step3/{id}', 'HomeController@application_step3');
Route::post('/application-step3/{id}', 'HomeController@application_step3');
Route::get('/application-step4', 'HomeController@application_step4');
Route::post('/application-step4', 'HomeController@application_step4');
Route::get('/verify-acceptance-fee', 'HomeController@verify_acceptance_fee');
Route::post('/verify-acceptance-fee', 'HomeController@verify_acceptance_fee');
Route::get('/exam-pass', 'HomeController@exam_pass');
Route::get('/home/logout', 'HomeController@logout');
Route::get('/privacy-policy', function () {
  return view('homepage.privacy');
});
Route::get('/unsubscribe/{id}', function () {
  return view('homepage.unsubscribe');
});

Route::get('/test', function () {

  dd("test");
});
Route::get('/audits', function () {
  $audits = DB::table('audits')->latest()->paginate(10);

  return view('test', compact('audits'));
})->middleware('auth');

Route::get('/marksheet3', function () {
  return view('marksheet3');
});
Route::get('/provisionalcrt', function () {
  return view('provisionalcrt');
});
Route::get('admin/provisionalcrt', function () {
  return view('academic.provisionalcrt');
});

Route::get('/dashboard', ['as' => 'user.dashboard', 'uses' => 'DashboardController@index']);
Auth::routes();


Route::get('/markasread', 'HomeController@read')->name('mark.read');
Route::resource('user', 'UserController');
// Route::get('/settings',[ 'as' => 'user.settings','uses'=>'UserController@settings']);
// Route::post('/settings',[ 'as' => 'user.settings','uses'=>'UserController@postSettings']);



Route::get('/admin/lecturer-course-assign', 'LecturerCourseController@assignCouseGet')->name('course.assign');
Route::post('/admin/lecturer-course-assign', 'LecturerCourseController@assignCousePost')->name('lecturerAssignCourse.store');

Route::get('/admin/lecturer-courses', 'LecturerCourseController@lecturerCourses')->name('lecturerAssignedCourses.list');
Route::get('/admin/plain-mark-sheet/{courseId}', 'CourseController@showPlainCourseMarkSheet')->name('plain-course-mark-sheet');

Route::get('/admin/lecturer', 'LecturerController@listLecturer')->name('lecturer.list');
Route::get('/get-courses-list-json', 'CourseController@listCoursesByDepartment')->name('getCoursesByDepartmentIdJson');
Route::get('/get-department-list-json', 'Department_Controller@listDepartmentByFaculty')->name('getDepartmentsByFacultyIdJson');


Route::get('/admin/max-course-credit-unit', 'ManageCourseCreditUnitController@list')->name('max-course-credit-unit.list');
Route::get('/admin/max-course-credit-unit/create', 'ManageCourseCreditUnitController@create')->name('max-course-credit-unit.create');
Route::post('/max-course-credit-unit', 'ManageCourseCreditUnitController@store')->name('max-course-credit-unit.store');

Route::get('/admin/max-course-credit-unit/{id}/update', 'ManageCourseCreditUnitController@edit')->name('max-course-credit-unit.edit');
Route::post('/admin/max-course-credit-unit/{id}/update', 'ManageCourseCreditUnitController@update')->name('max-course-credit-unit.update');
