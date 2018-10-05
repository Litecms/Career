<?php

// Resource routes  for resume
Route::group(['prefix' => set_route_guard('web').'/career'], function () {
    Route::resource('resume', 'ResumeResourceController');
});

// Public  routes for resume
Route::get('resume/popular/{period?}', 'ResumePublicController@popular');
Route::get('careers/', 'ResumePublicController@index');
Route::get('careers/{slug?}', 'ResumePublicController@show');
Route::post('resume/upload', 'ResumePublicController@upload');

// Resource routes  for job
Route::group(['prefix' => set_route_guard('web').'/career'], function () {
    Route::resource('job', 'JobResourceController');
});

// Public  routes for job
Route::get('job/popular/{period?}', 'JobPublicController@popular');
Route::get('careers/', 'JobPublicController@index');
Route::get('apply/{slug?}', 'JobPublicController@apply');

Route::get('career/{slug?}', 'JobPublicController@show');


