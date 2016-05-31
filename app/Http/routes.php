<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/',"NewUserController@getAllUserData");

Route::get('/add',"NewUserController@getUser");
Route::post('/add',"NewUserController@insertUser");

Route::get('/explore',"NewUserController@getMap");
Route::get('/explore/{id}',array('as'=>'showInfo','uses'=>'NewUserController@showdata'));

Route::get('/update/{id}',array('as'=>'getupdate','uses'=> 'NewUserController@getUpdateUser'));
Route::post('/update/{id}',array('as'=>'postupdate','uses'=> 'NewUserController@postUpdateUser'));

Route::get('/delete/{id}',array('as'=>'getdelete','uses'=> 'NewUserController@deleteUser'));

//  Route::get('/email',function(){
// 	Mail::send('email.contact',['name'=>'klk'],function($message) {
// 	 		$message->to('recieverklk@gmail.com','Reciever klk')->from('senderklk@gmail.com','Sender klk')->subject('This is demo');
// 	 	});
//  });