<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', 'Controller@home')->name('home');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/dashboard','Controller@dashboard')->name('dashboard');

//GUEST
Route::get('/register/{id}','Controller@register');
Route::post('registerSubmit','OrderController@registerOrder');

//STUDENT
Route::get('/editor/{url}', 'Controller@openDoc')->name('editor');
Route::get('/parse/{url}', 'Controller@parseDoc')->name('parse');
Route::post('submit_autosave','Controller@submit_autosave');
Route::post('post_foreign_words','Controller@skripdownForeignWords');
Route::post('post_editor_update','Controller@editor_update');
Route::post('post_propose_advisor','Controller@proposeAdvisor');
Route::post('post_submit_repository','Controller@submitRepository');
Route::post('post_submit_revision','Controller@submitRevision');
Route::post('post_read_message','Controller@readMessage');

//LECTURER
Route::get('/bimbingan', 'Controller@bimbinganHistory');
Route::get('/ujian', 'Controller@ujianSkripsi');
Route::post('accsubmit', 'Controller@acceptSubmit');
Route::post('rejsubmit', 'Controller@rejectSubmit');
Route::post('accthesis', 'Controller@acceptThesis');
Route::post('rejthesis', 'Controller@rejectThesis');
Route::post('progthesis', 'Controller@progresThesis');
Route::post('exampass','Controller@exam');

//DEPARTMENT
Route::get('/thesis-topic', 'Controller@historyBimbingan');
Route::get('/ujianPlagiasi', 'Controller@ujianPlagiasi');
Route::get('/pengaturan', 'Controller@deptSetting');
Route::post('getplag','Controller@getPlagiarism');
Route::post('plagcheck','Controller@plagiarismCheck');
Route::post('plagconf','Controller@plagiarismConf');
Route::post('deptpass','Controller@deptPassword');
Route::post('initexam','Controller@initExaminer');
