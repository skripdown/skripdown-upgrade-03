<?php

use App\Http\back\_UI;
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
Route::get('/',function (){return redirect()->route('home');});
Route::get('/home', 'Controller@home')->name('home');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/dashboard','Controller@dashboard')->name('dashboard');

//REGISTER & ORDER
Route::get('/register/{id}','Controller@register');
Route::post('registerSubmit','OrderController@registerOrder');
Route::get('/order/{token}','OrderController@order');
Route::post('/verifyOrder','OrderController@verifyOrder');
Route::post('/cancelOrder','OrderController@cancelOrder');
Route::get('/verify/{token}','RegistrationController@registers');

//TEMPLATE
Route::get('/templates{flag}','TemplateController@templates')->name('templates');
Route::get('/templates',function (){return redirect()->route('templates',[_UI::$FLAG_UI]);});

//PREVILEGE
Route::get('/previleges{flag}','PrevilegeController@previleges')->name('previleges');
Route::get('/previleges',function (){return redirect()->route('previleges',[_UI::$FLAG_UI]);});

//DOCUMENT
Route::get('/docs{flag}','DocumentController@documents')->name('documents');
Route::get('/docs',function (){return redirect()->route('documents',[_UI::$FLAG_UI]);});
Route::post('documentInsert', 'DocumentController@insert');

//USER
Route::get('/users{flag}','UserController@users')->name('users');
Route::get('/users',function (){return redirect()->route('users',[_UI::$FLAG_UI]);});

//SUPER
Route::get('/supers{flag}','SuperController@supers')->name('supers');
Route::get('/supers',function (){return redirect()->route('supers',[_UI::$FLAG_UI]);});

//FACULTY
Route::get('/faculty/{id}-{flag}','FacultyController@faculty')->name('faculty');
Route::get('/faculties{flag}', 'FacultyController@faculties')->name('faculties');
Route::get('/faculty',function (){return redirect()->route('faculties',[_UI::$FLAG_UI]);});
Route::get('/faculty/{id}',function ($id){return redirect()->route('faculty',[$id, _UI::$FLAG_UI]);});
Route::get('/faculties',function (){return redirect()->route('faculties',[_UI::$FLAG_UI]);});
Route::post('/facultyInsert','FacultyController@insert');
Route::post('/facultyUpdate','FacultyController@update');
Route::post('/facultyDelete','FacultyController@delete');

//DEPARTMENT
Route::get('/departments{flag}','DepartmentController@departments')->name('departments');
Route::get('/departments',function (){return redirect()->route('departments',[_UI::$FLAG_UI]);});
Route::post('/departmentInsert','DepartmentController@insert');
Route::post('/departmentUpdate','DepartmentController@update');
Route::post('/departmentDelete','DepartmentController@delete');

//ADVISOR
Route::get('/advisors{flag}','AdvisorController@advisors')->name('advisors');
Route::get('/advisors',function (){return redirect()->route('advisors',[_UI::$FLAG_UI]);});
Route::post('/advisorInsert','AdvisorController@insert');
Route::post('/advisorUpdate','AdvisorController@update');
Route::post('/advisorDelete','AdvisorController@delete');

//STUDENT
Route::get('/students{flag}','StudentController@students')->name('students');
Route::get('/students',function (){return redirect()->route('students',[_UI::$FLAG_UI]);});
Route::post('/studentInsert','StudentController@insert');
Route::get('/active_advises{flag}','StudentController@active_advises')->name('active_advises');
Route::get('/active_advises',function (){return redirect()->route('active_advises',[_UI::$FLAG_UI]);});


//-------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------OLD ROUTE-----------------------------------------------------//

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
