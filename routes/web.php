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
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/create', 'AdminController@create')->name('admin');
Route::post('/admin','AdminController@store')->name('admin');



//route diario
Route::get('/diario', 'DiaryController@index')->name('diaries');

//route progetti
Route::resource('/projects', 'ProjectController')->except(['destroy']);
Route::get('/projects/{project}/delete', 'ProjectController@destroy');


//route clienti
Route::resource('/customers', 'CustomerController')->except(['destroy']);
Route::get('/customers/{customer}/delete', 'CustomerController@destroy');

//route assegnazioni
Route::resource('/assignments', 'AssignmentController')->except(['destroy']);
Route::get('/assignments/{assignment}/delete', 'AssignmentController@destroy');

//route utenti
Route::resource('/users', 'UserController')->except(['destroy']);
Route::get('/users/{user}/delete', 'UserController@destroy');



