<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('/home', '\App\Http\Controllers\HomeController@index');
//Route::get('/connexion', '\App\Http\Controllers\HomeController@create');
Route::get('/home','HomeController@index')->name('home');
    Route::prefix('Patient')->group(function () {
        Route::get('/create', ['middleware' => 'auth', 'uses' => 'PatientController@create']);
        Route::post('/store',['middleware' => 'auth', 'uses' => "PatientController@store"]);
        Route::post('/update/{id}',['middleware' => 'auth', 'uses' =>  'PatientController@update']);
        Route::get('/edit/{id}', ['middleware' => 'auth', 'uses' => 'PatientController@edit']);
        Route::get('/show/{id}', ['middleware' => 'auth', 'uses' => 'PatientController@show']);
        Route::get('/patient',['middleware' => 'auth', 'uses' => "PatientController@index"]);
    });
    Route::get('/destroy/{id}', ['middleware' => 'auth', 'uses' => 'PatientController@destroy']);
   /* Route::get('/patients', function () {
        $patients = App\Patient::all();
    
        return view('patients', [
            'patients' => $patients
        ]);
    });*/
    Route::prefix('Rendezvous')->group(function () {
        Route::get('/create', ['middleware' => 'auth', 'uses' =>"RendezvousController@create"]);
        Route::post('/store', ['middleware' => 'auth', 'uses' =>"RendezvousController@store"]);
        Route::get('/edit/{id}', ['middleware' => 'auth', 'uses' => 'RendezvousController@edit']);
        Route::post('/update/{id}', ['middleware' => 'auth', 'uses' => 'RendezvousController@update']);
        Route::get('/destroy/{id}',  ['middleware' => 'auth', 'uses' =>'RendezvousController@destroy']);
        Route::get('/show/{id}',  ['middleware' => 'auth', 'uses' =>'RendezvousController@show']);
        Route::get('/rendezvous', ['middleware' => 'auth', 'uses' =>"RendezvousController@index"]);
    });
    
    Route::prefix('Consultation')->group(function () {
        Route::get('/create', ['middleware' => 'auth', 'uses' =>"ConsultationController@create"]);
        Route::post('/store', ['middleware' => 'auth', 'uses' =>"ConsultationController@store"]);
        Route::get('/edit/{id}', ['middleware' => 'auth', 'uses' => 'ConsultationController@edit']);
        Route::post('/update/{id}', ['middleware' => 'auth', 'uses' => 'ConsultationController@update']);
        Route::get('/destroy/{id}', ['middleware' => 'auth', 'uses' => 'ConsultationController@destroy']);
        Route::get('/show/{id}', ['middleware' => 'auth', 'uses' =>'ConsultationController@show']);
        Route::get('/consultations', ['middleware' => 'auth', 'uses' =>"ConsultationController@index"]);
    });
    
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
