<?php

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin', 'middleware' => ['verified', 'can:view-admin']], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'Back\UserController@index')->name('admin.users.index');
    });
});
