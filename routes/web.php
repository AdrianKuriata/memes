<?php

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['verified', 'can:view-admin'], 'namespace' => 'Back'], function () {
    Route::resource('{module}', 'ModuleController', [
        'parameters' => [
            '{module}' => 'id'
        ]
    ]);
});
