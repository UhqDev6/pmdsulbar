<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/admin', 'AdminController@index')->name('admin');
// Route::get('/admin','AdminController@selectData')->name('admin');
Route::get('/user','UserController@index')->name('user');


// admin route
Route::get('crud', 'CrudController@index')->name('crud');
Route::get('crud/tambahdata', 'CrudController@tambah')->name('crud.add');
Route::post('crud', 'CrudController@simpan')->name('crud.save');
Route::delete('crud/{id}','CrudController@delete')->name('crud.delete');
Route::get('crud/{id}/edit','CrudController@edit')->name('crud.edit');
Route::patch('crud/{id}','CrudController@update')->name('crud.update'); 

Route::get('masterdata','MasterdataController@index')->name('masterdata');
Route::get('masterdata/tambahdata','MasterdataController@tambahData')->name('masterdata.tambahData');
Route::post('masterdata/simpandataprov','MasterdataController@SimpanDataProv')->name('masterdata.simpandataprov');
Route::post('masterdata/simpandatakab','MasterdataController@SimpanDataKab')->name('masterdata.simpandatakab');
Route::post('masterdata/simpandatakec','MasterdataController@SimpanDataKec')->name('masterdata.simpandatakec');
Route::delete('masterdata/deleteprov/{id}','MasterdataController@DeleteProv')->name('masterdata.deleteprov');
Route::delete('masterdata/deletekab/{id}','MasterdataController@DeleteKab')->name('masterdata.deletekab');
Route::delete('masterdata/deletekec/{id}','MasterdataController@DeleteKec')->name('masterdata.deletekec');
Route::get('masterdata/{id}/editprov','MasterdataController@EditProv')->name('masterdata.editprov');
Route::patch('masterdata/{id}/updatepro','MasterdataController@UpdateProv')->name('masterdata.updateprov');
Route::get('masterdata/{id}/editkab','MasterdataController@EditKab')->name('masterdata.editkab');
Route::patch('masterdata/{id}/updatekab','MasterdataController@UpdateKab')->name('masterdata.updatekab');
Route::get('masterdata/{id}/editkec','MasterdataController@EditKec')->name('masterdata.editkec');
Route::patch('masterdata/{id}/updatekec','MasterdataController@UpdateKec')->name('masterdata.updatekec');

Route::get('datauser','MasterdataController@indexuser')->name('datauser');
Route::get('datauser/cetak','MasterdataController@cetak')->name('datauser.cetak');




// user route
Route::get('crudpmd','CrudpmdController@index')->name('crudpmd');
Route::get('crudpmd/viewdata','CrudpmdController@ViewData')->name('crudpmd.viewdata');
Route::post('crudpmd/tambahdata', 'CrudpmdController@TambahData')->name('crudpmd.tambahdata');
// Route::get('crudpmddatakec/{id}', 'CrudpmdController@crudpmddatakec' );


// Route::get('/home', 'HomeController@index')->name('home');


 