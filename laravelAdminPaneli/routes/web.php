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
Route::get('/', 'MenuController@indexFilter')->name('indexFilter');

/****************Menü Kısmı***************/
Route::get('/admin', 'SiteController@index');
Route::get('/admin/menuler','SiteController@menulerMethod')->name('menuListesi');
Route::get('/admin/menuler/duzenle/{id?}','SiteController@menuDuzenle')->name('menuDuzenle');
Route::post('/admin/menuler/kaydet/{id?}','SiteController@menuKaydet')->name('menuKayit');
Route::get('/admin/menuler/sil/{id?}','SiteController@menuSil')->name('menuSil');
Route::get('/admin/menuler.','SiteController@menulerMetodu')->name('menuler');
Route::get('/admin/menuler/liste/{id?}','SiteController@menuListesi')->name('menuListe');

/****************Kategoriler Kısmı***************/
Route::get('/admin/kategoriler','SiteController@kategoriMethod')->name('kategoriListesi');
Route::get('/admin/kategoriler/duzenle/{id?}','SiteController@kategoriDuzenle')->name('kategoriDuzenle');
Route::post('/admin/kategoriler/kaydet/{id?}','SiteController@kategoriKaydet')->name('kategoriKayit');
Route::get('/admin/kategoriler/sil/{id?}','SiteController@kategoriSil')->name('kategoriSil');
Route::get('/admin/kategoriler.','SiteController@kategorilerMetodu')->name('kategoriler');
Route::get('/admin/kategoriler/liste/{id?}','SiteController@kategoriListesi')->name('kategoriListe');


/****************Site Kısmı***************/
Route::get('/qr-menu/about', function () {
    return view('/qr-menu/about');
});

Route::get('/qr-menu/book', function () {
    return view('/qr-menu/book');
});
Route::get('/qr-menu/menu/{id?}','MenuController@menuFilter')->name('menuFilter');
    

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/logout', 'Auth\LogoutController@logout')->name('logout');

