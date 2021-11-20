<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// use Illuminate\Routing\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::apiResources(['student' => 'API\StudentController']);
Route::group(['namespace' => 'student'], function () {
    Route::post('/student-payment/pay/{invoice_id}', 'PaymentController@save_payment_page');
    Route::get('/student-payment/pay/{invoice_id}', 'PaymentController@save_payment_page');

    Route::post('/student-payment/pay-interswitch/{invoice_id}', 'PaymentController@save_payment_page_interswitch');
    Route::get('/student-payment/pay-interswitch/{invoice_id}', 'PaymentController@save_payment_page_interswitch');


    Route::post('/save_bank_ref', 'PaymentController@save_bank_ref');
    Route::post('/save_bank_ref_direct', 'PaymentController@save_bank_ref_direct');

    Route::post('/save_application_fee/{fee_id}', 'PaymentController@save_application_fee');
    Route::get('/save_application_fee/{fee_id}', 'PaymentController@save_application_fee');
    
    Route::post('/save_application_fee_interswitch/{fee_id}', 'PaymentController@save_application_fee_interswitch');
    Route::get('/save_application_fee_interswitch/{fee_id}', 'PaymentController@save_application_fee_interswitch');

    Route::post('/save_direct_interswitch', 'PaymentController@save_direct_interswitch');
    Route::get('/save_direct_interswitch', 'PaymentController@save_direct_interswitch');

    Route::post('/save_direct_remita', 'PaymentController@save_direct_remita');
    Route::get('/save_direct_remita', 'PaymentController@save_direct_remita');

    Route::post('/pg/save_application_fee/{fee_id}', 'PaymentController@pg_save_application_fee');
    Route::get('/pg/save_application_fee/{fee_id}', 'PaymentController@pg_save_application_fee');
    Route::post('pg/save_bank_ref', 'PaymentController@pg_save_bank_ref');
    
    Route::post('/pg/save_application_fee_interswitch/{fee_id}', 'PaymentController@pg_save_application_fee_interswitch');
    Route::get('/pg/save_application_fee_interswitch/{fee_id}', 'PaymentController@pg_save_application_fee_interswitch');

    Route::get('/payment-notification', 'PaymentController@payment_notification');
    Route::post('/payment-notification', 'PaymentController@payment_notification');

    Route::post('/save_acceptance_fee/{fee_id}', 'PaymentController@save_acceptance_fee');
    Route::get('/save_acceptance_fee/{fee_id}', 'PaymentController@save_acceptance_fee');

    Route::post('/save_acceptance_fee_interswitch/{fee_id}', 'PaymentController@save_acceptance_fee_interswitch');
    Route::get('/save_acceptance_fee_interswitch/{fee_id}', 'PaymentController@save_acceptance_fee_interswitch');

    Route::post('/update_application_payment', 'PaymentController@update_application_payment');
});




// Route::post('/get_lgas', 'HomeController@registration');