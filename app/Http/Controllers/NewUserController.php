<?php 

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;


class NewUserController extends Controller {
	private $_UserData;
	
 	function __construct() {
 		$this->_UserData	= 	new UserData();
 	}
 	
 	/**
 	 * this function is loaded very first time to show all users.
 	 */
	 function getAllUserData() {
	 	$users  = $this->_UserData->all();
	 	return view('home')->with('users',$users);
	 } 
	   
	/**
	 * this function shows add user page for entering information for new data
	 */
	function getUser() {
		return view('addUser');
	}
	
	/**
	 * this method is used for inserting new user into table. 
	 */
	function insertUser(Request $request) {
		$this->_UserData->user_name	 	=   	$request->get('uname');
		$this->_UserData->email_id   	=   	$request->get('emailId');
		$this->_UserData->academics  	=    	$request->get('academics');
		$this->_UserData->phone_no   	=    	$request->get('Phone');
		$this->_UserData->longitude  	=    	$request->get('long'); 
		$this->_UserData->latitude   	=    	$request->get('lati'); 
		$this->_UserData->description  	=   	$request->get('description'); 
	    
	    if($this->_UserData->save()) {
	    	$uploads_dir = realpath(dirname(getcwd()));
	    	$last_inserted_id			=		$this->_UserData->id;
	    		if ($_FILES["fileToUpload"]["error"]  == UPLOAD_ERR_OK) {
	    			$tmp_name = $_FILES["fileToUpload"]["tmp_name"];
  	    			 move_uploaded_file($tmp_name, $uploads_dir."/public/uploads/".$last_inserted_id.'.jpg');
	    		}
	    		$users = $this->getAllUserData();	
	    		return Redirect::to('/');
	    	}
	    }

	 /**
	  * this method shows update view with all old entries of that user.
	  */
	 function getUpdateUser($id) {
	    $userinfo	= 	$this->_UserData->find($id);
        return view('updateUser')->with('userinfo',$userinfo);
	 }
	 
	 /**
	  * this method is used for posting update by users into table.
	  */
	 function postUpdateUser(Request $request,$id) {
	 	$userinfo				= 	$this->_UserData->find($id);
	 	$userinfo->user_name	=   	$request->get('uname');
	 	$userinfo->email_id   	=   	$request->get('emailId');
	 	$userinfo->academics  	=    	$request->get('academics');
	 	$userinfo->phone_no   	=    	$request->get('Phone');
	 	$userinfo->longitude  	=    	$request->get('long');
	 	$userinfo->latitude   	=    	$request->get('lati');
	 	$userinfo->description  =   	$request->get('description');
	 	$userinfo->save();
	 	if (isset($_FILES) && $_FILES["fileToUpload"]["error"]  == UPLOAD_ERR_OK) {
	 		$uploads_dir 		= realpath(dirname(getcwd()));
	 		$last_inserted_id	= $userinfo->id;
	 		$tmp_name = $_FILES["fileToUpload"]["tmp_name"];
	 		move_uploaded_file($tmp_name, $uploads_dir."/public/uploads/".$last_inserted_id.'.jpg');
	 	}
	 	return Redirect::to('/');
	 }
	 
	 /**
	  * this method is used for deleting a user record in the table.
	  */
	 function deleteUser($id) {
		 $user 				= 			$this->_UserData->find($id);
		 $impath			=			realpath(dirname(getcwd()));
		 $imagepath			=			$impath."/public/uploads/".$id.'.jpg';
		 $user->delete();
		 if($imagepath) {
		 unlink($imagepath);
		 }
		 return Redirect::to('/');
	 }
	 
	 /**
	  * this method returns map view.
	  */
	 function getMap() {
	 	$users  = $this->_UserData->all();
	 	return view('gmap')->with('users',$users);
	 }
	 
	 /**
	  * shows all data from database for a given academy. 
	  */
	 function showdata($id) {
	 	$user 				= 			$this->_UserData->find($id);
	 	Mail::send('email.contact',['name'=>'klk'],function($message) {
	 		$message->to('recieverklk@gmail.com','Reciever klk')->from('senderklk@gmail.com','Sender klk')->subject('welcome');
	 	});
	 
	 	return view('userData')->with('user',$user);
	 }
		
	}
	

	
	
	
	
	

