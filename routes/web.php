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

Route::get('/', 'WellcomeController@wellcome')->name('wellcome');
Route::get('/jurusan/{id}', 'WellcomeController@show')->name('show.jurusan');
Route::get('galleri', 'WellcomeController@getGallery')->name('show.gallery');
Route::get('/berita/{id}', 'WellcomeController@showBerita')->name('show.berita');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'adminController@index')->name('admin.dashboard');
  Route::get('/students', 'adminController@showStudent')->name('admin.students');
  Route::get('/students/{id}', 'adminController@studentsDelete')->name('admin.students.delete');
  Route::get('/buatakunsiswa', 'adminController@buatAkun')->name('admin.buat.akun');
  Route::get('/create', 'adminController@newPost')->name('admin.create.post');
  Route::post('/create', 'PostsController@storePost')->name('admin.create.post.submit');
  Route::get('/create/faculty', 'adminController@getFaculty')->name('admin.create.faculty');
  Route::post('/create/faculty', 'JurusanController@store')->name('admin.create.faculty.submit');
  Route::get('/create/faculty/{id}', 'adminController@hapusFacultys')->name('admin.create.faculty.delete');
  Route::get('/create/gallery', 'adminController@getGallery')->name('admin.create.gallery');
  Route::post('/create/gallery', 'GalleryController@store')->name('admin.create.gallery.submit');
  Route::get('/create/gallery/{id}', 'GalleryController@delete')->name('admin.create.gallery.delete');
  Route::resource('/create/categorys', 'CategoryController');
  Route::get('/create/news', 'NewsController@getBerita')->name('admin.create.news');
  Route::post('/create/news', 'NewsController@storeNews')->name('admin.create.news.submit');
  Route::get('/create/news/{id}', 'NewsController@delete')->name('admin.create.news.delete');
  Route::get('/create/announcement', 'InfoController@show')->name('admin.show.info');
  Route::post('/create/announcement', 'InfoController@storeInfo')->name('admin.create.info.submit');
  Route::get('/create/announcement/{id}', 'InfoController@delete')->name('admin.create.info.delete');
  Route::get('/wellcome', 'ContentController@show')->name('admin.advance.show');
  Route::post('/wellcome', 'ContentController@store')->name('admin.advance.store');
  Route::get('/wellcome/{id}', 'ContentController@delete')->name('admin.advance.delete');
  Route::get('/texts', 'WhyController@show')->name('admin.why.show');
  Route::post('/texts', 'WhyController@store')->name('admin.why.post');
  Route::get('/texts/{id}', 'WhyController@delete')->name('admin.why.delete');
  // Route::get('/home/user/{username}', 'profileController@getProfile')->name('profile.index');

});


Route::group(['middleware' => 'auth'], function () {
  Route::get('/home', 'HomeController@index')->name('home.forum');
  Route::get('/info', 'HomeController@info')->name('home.info');
  Route::get('/upload', 'HomeController@upload')->name('home.upload');
  Route::post('/upload', 'HomeController@store')->name('home.upload.submit');
  Route::post('/status', 'StatusController@postStatus')->name('home.status.post');
  Route::post('/status/{statusId}/reply', 'StatusController@postReply')->name('status.reply');
  Route::get('/status/{statusId}/like', 'StatusController@getLike')->name('status.like');
  Route::get('/status/{id}/delstatus', 'StatusController@hapusStatus')->name('status.delete');

  Route::get('/learn/{slug}', 'HomeController@infoSingle')->where('slug', '[\w\d\-\_]+')->name('info.single');
  Route::get('lesson/{category_id}','HomeController@getCategory')->name('catpage');

});
