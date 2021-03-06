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

//Route::get('/home', 'HomeController@index')->name('home');

//route Admin
Route::resource('/admin', 'AdminController');


//route progetti
Route::get('/projects/terminated', 'ProjectController@show_terminated');
Route::resource('/projects', 'ProjectController')->except(['destroy'],['terminate']);
Route::get('/projects/{project}/delete', 'ProjectController@destroy');
Route::get('/projects/{project}/terminate', 'ProjectController@terminate');


//route clienti
Route::get('/customers/terminated', 'CustomerController@show_terminated');
Route::resource('/customers', 'CustomerController')->except(['destroy']);
Route::get('/customers/{customer}/delete', 'CustomerController@destroy');


//route assegnazioni
Route::resource('/assignments', 'AssignmentController')->except(['destroy']);
Route::get('/assignments/{assignment}/delete', 'AssignmentController@destroy');

//route utenti
Route::get('/users/terminated', 'UserController@show_terminated');
Route::resource('/users', 'UserController')->except(['destroy']);
Route::get('/users/{user}/delete', 'UserController@destroy');

//route diario
Route::resource('/diaries', 'DiaryController')->except(['destroy']);
Route::get('/diaries/{diary}/delete', 'DiaryController@destroy');


