<?php

Route::get('install', 'Install@get');
Route::get('uninstall', 'Uninstall@get');

Route::get('autologin', 'Auth\AutologinController@autologin')->name('app.autologin');
Route::get('insales', 'Auth\LoginController@logout')->name('custom.logout');

Route::get('home', 'Settings@get')->middleware(['auth.check'])->name('home');
Route::get('settings-js', 'Settings@getJS');

Route::get('setup', 'FirstTimeSetup@get')->middleware(['auth.check']);
Route::get('firstTimeSetup', 'FirstTimeSetup@getJS');

Route::get('completeSetup', 'Init@completeSetup');

Route::get('init', 'Init@init');
Route::get('getSetupStatus', 'Init@getSetupStatus');

Route::get('saveCkSecret', 'CkSecret@save');
Route::get('saveCkSett', 'CkSett@save');
Route::get('saveCkVAT', 'CkVAT@save');
Route::get('saveCKGatewayExceptions', 'CKGatewayExceptions@save');

Route::get('users', 'UsersController@showAll')->middleware(['auth.check'])->name('users');

Route::get('instruction', 'HomeController@showInstruction')->name('instruction');

Route::fallback('HomeController@showInstruction');
