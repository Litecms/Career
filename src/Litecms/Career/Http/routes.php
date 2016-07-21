<?php

// Admin web routes  for job
Route::group(['prefix' => trans_setlocale() . '/admin/career'], function () {
    Route::post('job/status/{job}', 'Litecms\Career\Http\Controllers\JobAdminController@update');
    Route::resource('job', 'Litecms\Career\Http\Controllers\JobAdminController');
});

// Admin API routes  for job
Route::group(['prefix' => trans_setlocale() . 'api/v1/admin/career'], function () {
    Route::resource('job', 'Litecms\Career\Http\Controllers\JobAdminApiController');
});

// User web routes for job
Route::group(['prefix' => trans_setlocale() . '/user/career'], function () {
    Route::resource('job', 'Litecms\Career\Http\Controllers\JobUserController');
});

// User API routes for job
Route::group(['prefix' => trans_setlocale() . 'api/v1/user/career'], function () {
    Route::resource('job', 'Litecms\Career\Http\Controllers\JobUserApiController');
});

// Public web routes for job
Route::group(['prefix' => trans_setlocale() . '/careers'], function () {
    Route::get('job/', 'Litecms\Career\Http\Controllers\JobController@index');
    Route::get('jobs/{slug?}', 'Litecms\Career\Http\Controllers\JobController@views');
    Route::get('job/{job_type?}', 'Litecms\Career\Http\Controllers\JobController@show');
});

// Public API routes for job
Route::group(['prefix' => trans_setlocale() . 'api/v1/careers'], function () {
    Route::get('/', 'Litecms\Career\Http\Controllers\JobApiController@index');
    Route::get('/{slug?}', 'Litecms\Career\Http\Controllers\JobApiController@show');
});

// Admin web routes  for resume
Route::group(['prefix' => trans_setlocale() . '/admin/career'], function () {
    Route::resource('resume', 'Litecms\Career\Http\Controllers\ResumeAdminController');
});

// Admin API routes  for resume
Route::group(['prefix' => trans_setlocale() . 'api/v1/admin/career'], function () {
    Route::resource('resume', 'Litecms\Career\Http\Controllers\ResumeAdminApiController');
});

// User web routes for resume
Route::group(['prefix' => trans_setlocale() . '/user/career'], function () {
    Route::resource('resume', 'Litecms\Career\Http\Controllers\ResumeUserController');
});

// User API routes for resume
Route::group(['prefix' => trans_setlocale() . 'api/v1/user/career'], function () {
    Route::resource('resume', 'Litecms\Career\Http\Controllers\ResumeUserApiController');
});

// Public web routes for resume
Route::group(['prefix' => trans_setlocale() . '/careers'], function () {
    Route::get('resume/job/{slug?}', 'Litecms\Career\Http\Controllers\ResumeController@index');
    Route::post('resume/upload', 'Litecms\Career\Http\Controllers\ResumeController@upload');
    // Route::get('resume/{slug?}', 'Litecms\Career\Http\Controllers\ResumeController@show');
});

// Public API routes for resume
Route::group(['prefix' => trans_setlocale() . 'api/v1/careers'], function () {
    Route::get('/', 'Litecms\Career\Http\Controllers\ResumeApiController@index');
    Route::get('/{slug?}', 'Litecms\Career\Http\Controllers\ResumeApiController@show');
});
