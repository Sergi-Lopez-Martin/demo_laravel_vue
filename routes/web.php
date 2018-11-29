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

// DB::listen(function($query){
//   var_dump($query->sql);
// });

Route::get('email', function(){
  return new App\Mail\LoginCredentials(App\User::first(), '123123');
});


Route::get('/preview/nosotros', 'PagesController@about')->name('pages.about');
Route::get('/preview/archivo', 'PagesController@archive')->name('pages.archive');
Route::get('/preview/contacto', 'PagesController@contact')->name('pages.contact');




Route::get('preview/post/{post}', 'PostsController@show')->name('posts.show');
Route::get('preview/categorias/{category}', 'CategoriesController@show')->name('categories.show');
Route::get('preview/tags/{tag}', 'TagsController@show')->name('tags.show');

Route::get('preview/post/{post}', 'PostsController@show')->name('posts.show');


Route::group([
  'prefix' => 'admin',
  'namespace' => 'Admin',
  'middleware' => 'auth'],
function(){
    Route::get('/', 'AdminController@index')->name('dashboard');

    Route::resource('posts', 'PostsController', ['except' => 'show', 'as' => 'admin']);
    Route::resource('users', 'UsersController', ['as' => 'admin']);
    Route::resource('roles', 'RolesController', ['except' => 'show', 'as' => 'admin']);

    Route::resource('permissions', 'PermissionsController', ['only' => ['index', 'edit', 'update'], 'as' => 'admin']);

    // Route::middleware('permission:Update roles')->put('users/{user}/roles', 'UsersRolesController@update')->name('admin.users.roles.update');
    Route::middleware('role:Admin')->put('users/{user}/roles', 'UsersRolesController@update')->name('admin.users.roles.update');
    Route::middleware('role:Admin')->put('users/{user}/permissions', 'UsersPermissionsController@update')->name('admin.users.permissions.update');

    Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');
    Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');




});


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/{any?}', 'PagesController@spa')->name('pages.home')->where('any', '.*');
