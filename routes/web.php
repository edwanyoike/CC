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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('church/index', 'ChurchController@index');

Route::get('church/event', 'ChurchController@createChurchEvent');
Route::get('church/create', 'ChurchController@create');
Route::post('church/store', 'ChurchController@store');
Route::post('church/update', 'ChurchController@store');
Route::get('church/{church}', 'ChurchController@show');


Route::get('member/index', 'MemberController@index');
Route::get('member/create', 'MemberController@create');
Route::post('member/store', 'MemberController@store');

Route::get('department/index', 'DepartmentController@index');
Route::get('department/create', 'DepartmentController@create');
Route::post('department/store', 'DepartmentController@store');
Route::get('department/event', 'DepartmentController@departmentEvents');
Route::get('department/createEvent', 'DepartmentController@createDepartmentEvent');
Route::post('event/department', 'EventController@storeDepartmentEvent');












