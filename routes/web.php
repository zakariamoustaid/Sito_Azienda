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

//redirezione login in base al ruolo
Route::get('/user', 'UserController@index')->name('user');
Route::get('/admin', 'AdminController@index')->name('admin');


//route diario
Route::get('/diario', 'DiaryController@index')->name('diaries');

//route progetti
Route::get('/projects.index', 'ProjectController@index')->name('projects');
Route::get('/projects.create', 'ProjectController@create')->name('projects');
Route::get('/assegna_progetto', 'ProjectController@index')->name('projects');
Route::post('/projects','ProjectController@store')->name('projects');

//route clienti
Route::get('/customers.index', 'CustomerController@index')->name('customers');
Route::get('/customers.create', 'CustomerController@create')->name('customers');
Route::post('','CustomerController@store');

//route Admin
Route::get('/create', 'AdminController@create')->name('admin');
Route::post('/admin','AdminController@store')->name('admin');

