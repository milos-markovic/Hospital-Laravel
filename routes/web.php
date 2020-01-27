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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

    //Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('/','PublicController@index');

    Route::get('admins','Admin\AdminController@index');
    Route::resource('admin/asistents', 'Admin\AsistentController');
    Route::resource('admin/doctors', 'Admin\DoctorController');


     Route::resource('asistent/pacijents', 'Asistent\PacijentController');
     Route::resource('asistent/bolesti', 'Asistent\BolestController');
     Route::resource('asistent/categoryDrugs', 'Asistent\CategoryDrugController');
     Route::resource('asistent/categoryDrugs/{CategoryDrug}/drugs', 'Asistent\DrugController');

     Route::get('doctor', 'Doctor\DoctorController@index')->name('doctor.index');

     Route::resource('doctor/pacijents/{pacijent}/card','Doctor\CardController');
     Route::get('doctor/pacijents/{pacijent}/delete/card/{card}','Doctor\CardController@deleteCard')->name('card.delete');
     
     
     Route::get('cardInformationAjax','Doctor\CardController@cardInformation')->name('card.informations');
     Route::get('searchDrugAjax','Doctor\CardController@searchDrug')->name('card.searchDrug');

     Route::get('serachDrugEditAjax','Doctor\CardController@searchDrugForUpdate')->name('card.serachDrug.update');

     Route::get('addDrug','Doctor\CardController@addDrug');

   
     

     

   


    