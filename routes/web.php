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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return "Cache bersih";
});
Route::get('/clear-route', function() {
    $exitCode = Artisan::call('route:clear');
    return "route bersih";
});
Route::get('/clear-view', function() {
    $exitCode = Artisan::call('view:clear');
    return "view bersih";
});

//login user
Auth::routes();
//aktifasi register dengan email*/
Auth::routes(['verify' => true]);
//home butuh login terverifikasi*/
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
//login admin
Route::prefix('admin')->group(function() 
{
 Route::get('/login', 'Auth\AdminLoginController@showLoginForm') ->name('admin.login');
 Route::post('/login','Auth\AdminLoginController@login')	->name('admin.login.submit');
 Route::get('/','AdminController@index') ->name('admin.dashboard');
});

Route::prefix('superadmin')->group(function() 
   {
	Route::get('/login', 'Auth\SuperadminLoginController@showLoginForm') ->name('superadmin.login');
	Route::post('/login','Auth\SuperadminLoginController@login')->name('superadmin.login.submit');
	Route::get('/','SuperadminController@index') ->name('superadmin.dashboard');
  });


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/* ----------------------------------------------------------------------------------------------------------------- */
Route::get( '/','DataController@index'); //halaman depan
Route::resource( '/nasabah','DataController'); //tambah nasabah
Route::get( 'saldo/{id}','DataController@saldoIndex'); // mutasi nasabah
Route::post( 'saldo','DataController@saldoStore'); // tambah atau ambil saldo
Route::get( 'bunga/{id}','DataController@bungaShow'); // cek bunga tiap bulan
Route::post( 'bunga','DataController@bungaStore'); // tambah bunga
Route::post( 'bulan','DataController@bulanStore'); // tambah bulan otomatis tiap ganti bulan


//wilayah bertingkat
Route::get('identitas/kabupaten/{id}',array('as'=>'identitas.kabupaten','uses'=>'DataController@kabupaten'));
Route::get('identitas/kecamatan/{id}',array('as'=>'identitas.kecamatan','uses'=>'DataController@kecamatan'));
Route::get('identitas/kelurahan/{id}',array('as'=>'identitas.kelurahan','uses'=>'DataController@kelurahan'));

