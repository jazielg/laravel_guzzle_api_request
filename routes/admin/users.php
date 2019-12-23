<?php

Route::group(['prefix' => 'users'], function() {
    Route::get('/', 'Admin\UsersController@index')->name('admin.users.index');
});
