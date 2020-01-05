<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;
use Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Register extends Authenticatable
{
  
//class Register extends Model
//{
  

    protected $table="register_usres";


    public static function fromstore($data){

    	 $username=Input::get('username');
    	 //echo $username;
    	 $email=Input::get('email');
    	 //echo $email;
    	 $pass=Hash::make(Input::get('password'));
    	 //echo $pass;


    	 $users=new Register();
    	 $user->name=$username;
    	 $users->email=$email;
    	 $users->password=$pass;

    	 $users->save();
    }
}
