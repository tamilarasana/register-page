<?php

namespace App\Http\Controllers;

use Request;
use Input;
use Redirect;
use Validator;
use InputRedirect;
use Register;
use Auth;

class RegisterController extends Controller
{
    public function store(Request $request){
 		

   		$data=Request::except(array('_token'));

      // var_dump($data);
   

   		$rule=array(
   			'username' => 'required',
   			'email' => 'required|email',
   			'passwrd' => 'required|min:6',
   			'cpassword' => 'required|same:password',
   		);



   		$message=array(
   			'cpassword.required'=>'the confirm password is required',
   			'cpassword.min'=>'the confirm password must be at least 6 character',
   			'cpassword.same'=>'the confirm password and password must same',

   		);

   		$validator=Validator::make($data,$rule,$message);

 		 if($validator -> fails()){
        echo "failed validation";

   			return Redirect::to('register')-> withErrors($validator);
   		}else{
   			echo "passed validation";
   			Register::fromstore(Request::except(array('_token','cpassword')));

   			return Redirect::to('register')->with('sucess','sucessfully registered');
   		}
      
    } 



    public function login(){

   	     //echo "string";



 		$data=Request::except(array('_token'));

        //var_dump($data);
 

 		$rule=array(
 			
 			'email' => 'required|email',
 			'passwrd' => 'required|min:6',
 			
 		);


    	 $validator=Validator::make($data,$rule);

 		  if($validator -> fails()){
 			return Redirect::to('signin')-> withErrors($validator);
 		}else{    	

 				//$data=Input::except(array('_token'));

 				$userdata=array(
 					'email'=>Input::get('email'),
 					'password' =>Input::get('password'),
 				);


                //var_dump($data);
            if(Auth::attempt($data)){
            	return Redirect::to('');
            	 //echo "yes match";
            }else{
            	return Redirect::to('signin');
               // echo "not match"; 
            }
         
          }

     }

}