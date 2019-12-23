<?php

Route::group(['prefix' => 'users'], function() {
    Route::get('/', 'admin\UsersController@index')->name('admin-users');
});
