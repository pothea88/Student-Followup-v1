<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('logout', 'Admin\Auth\LoginController@logout')->name('logout');
Auth::routes();
Route::get('/',function(){
    return view('auth.login');
});
Route::post('/login', [
    'uses'          => 'Auth\LoginController@login',
    'middleware'    => 'checkstatus',
]);
Route::group(['prefix'=>'users'], function(){
    Route::get('/','admin\UserController@view')->name('view');
    Route::match(['GET', 'POST'], 'add', 'Admin\UserController@create');
    Route::match(['GET', 'POST'], 'edit/{id}', 'Admin\UserController@edit')->name('edit');
    Route::post('update/{id}','admin\UserController@update')->name('update');
    Route::get('inactive/{id}','admin\UserController@inactive')->name('inactive');
    Route::get('active/{id}','admin\UserController@active')->name('active');
    Route::get('/mentor/{id}','admin\UserController@mentorStudent')->name('mentor');
    Route::get('/tutorComments/{id}','admin\UserController@comments')->name('tutorComments');
});
Route::group(['prefix'=>'students'],function(){
    Route::get('/show','StudentController@index')->name('show');
    Route::get('/add','StudentController@create');
    Route::post('/addStudent','StudentController@store');
    Route::get('/showEdit/{id}','StudentController@show')->name('showEdit');
    Route::patch('/update/{id}','StudentController@update')->name('update');
    Route::get('/deleteStudent/{id}','StudentController@destroy')->name('deleteStudent');
    Route::get('/detail/{id}','StudentController@detail')->name('detail');
    Route::get('viewTotalStudentFollowup','StudentController@viewTotalStudentFollowup')->name('viewTotalStudentFollowup');
    Route::get('/viewStudentOutOfFollowup','StudentController@viewStudentOutOfFollowup')->name('viewStudentOutOfFollowup');
    Route::get('/followup/{id}','StudentController@followUp')->name('followup');
    Route::get('/outOfFollowup/{id}','StudentController@OutOfFollowUp')->name('outOfFollowup');
    Route::get('/viewNormalStudent','StudentController@viewNormalStudent')->name('viewNormalStudent');
});
Route::group(['prefix'=>'comment'],function(){
    Route::get('/viewComment/{id}','CommentController@showComment')->name('viewComment');
    Route::get('/commentForm/{id}','CommentController@create')->name('commentForm');
    Route::post('/add/{id}','CommentController@store')->name('add');
    Route::get('/formEdit/{id}','CommentController@edit')->name('formEdit');
    Route::patch('/updateComment/{id}','CommentController@update')->name('updateComment');
    Route::get('/deleteComment/{id}','CommentController@destroy')->name('deleteComment');
});
Route::get('/home', 'HomeController@index')->name('home');




