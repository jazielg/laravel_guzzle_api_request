<?php

Route::group(['prefix' => 'users', 'middleware' => 'proxy.auth'], function() {
    Route::get('/', 'Admin\UsersController@index')->name('admin.users.index');
});
