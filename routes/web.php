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

Route::get('/', function () {
    return redirect()->route('groups');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// AdminSeeder panel routes

Route::middleware('can:accessAdmin')->group(function(){

    //Student routes
    Route::get('admin/students', 'ProfileController@index')->name('students');
    Route::post('admin/groupUsersStore', 'GroupUsersController@store')->name('groupUsers.store');

    //Course routes
    Route::get('admin/courses', 'CourseController@index')->name('courses');
    Route::get('admin/courses/create', 'CourseController@create')->name('courses.create');
    Route::post('admin/courses/store', 'CourseController@store')->name('courses.store');
    Route::get('admin/courses/edit/{course}', 'CourseController@edit')->name('courses.edit');
    Route::post('admin/courses/update/{course}', 'CourseController@update')->name('courses.update');
    Route::get('admin/courses/delete/{course}', 'CourseController@delete')->name('courses.delete');

    //Group routes
    Route::get('admin/groups/create', 'GroupController@create')->name('groups.create');
    Route::post('admin/groups/store', 'GroupController@store')->name('groups.store');
    Route::get('admin/groups/edit/{group}', 'GroupController@edit')->name('groups.edit');
    Route::post('admin/groups/store/{group}', 'GroupController@update')->name('groups.update');
    Route::post('admin/groups/delete/{group}', 'GroupController@delete')->name('groups.delete');

    //Lecture routes
    Route::get('admin/lectures/create', 'LectureController@create')->name('lectures.create');
    Route::post('admin/lectures/store', 'LectureController@store')->name('lectures.store');
    Route::get('admin/lectures/edit/{lecture}', 'LectureController@edit')->name('lectures.edit');
    Route::post('admin/lectures/update/{lecture}', 'LectureController@update')->name('lectures.update');
    Route::get('admin/lectures/delete/{lecture}', 'LectureController@delete')->name('lectures.delete');

    //File routes

    Route::get('files/setShow/{file}', 'FileController@setShow')->name('files.setShow');
    Route::get('files/delete/{file}', 'FileController@delete')->name('files.delete');

    //Message routes
    Route::get('admin/messages/create/{user}', 'MessageController@create')->name('messages.create');
    Route::post('admin/messages/store/{user}', 'MessageController@store')->name('messages.store');
    Route::get('admin/messages/delete/{message}/{user}', 'MessageController@delete')->name('messages.delete');
});





//Student panel routes

Route::middleware('auth')->group(function(){

    //Group routes
    Route::get('groups', 'GroupController@index')->name('groups');
    Route::get('groups/show/{group}', 'GroupController@show')->name('groups.show');
    Route::get('edit_user/{user}', 'ProfileController@edit')->name('edit.user');
    Route::post('update_user/{user}', 'ProfileController@update')->name('update.user');

    //Message routes
    Route::get('messages/{user}', 'MessageController@index')->name('messages');
    Route::get('messages/show/{user}', 'MessageController@show')->name('messages.show');
});








