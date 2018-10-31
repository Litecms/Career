<?php

// Resource routes  for resume
Route::group(['prefix' => set_route_guard('web').'/career'], function () {
    Route::resource('resume', 'ResumeResourceController');
    Route::resource('job', 'JobResourceController');
});

// Public  routes for job
Route::get('careers/', 'JobPublicController@index');
Route::get('career/{slug?}', 'JobPublicController@show');
Route::post('career/{slug?}', 'JobPublicController@apply');
