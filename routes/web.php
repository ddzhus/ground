<?php

use Illuminate\Support\Facades\Route;


Route::get('', 'TestController@index')->name('index');
Route::post('upload', 'TestController@upload')->name('upload');
Route::get('database', 'TestController@database')->name('database');
Route::get('queue', 'TestController@queue')->name('queue');
Route::get('queue/add', 'TestController@add')->name('queue.add');
Route::get('queue/retry', 'TestController@retry')->name('queue.retry');
Route::get('queue/clean', 'TestController@clean')->name('queue.clean');
