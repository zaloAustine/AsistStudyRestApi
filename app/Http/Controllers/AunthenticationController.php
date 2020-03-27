<?php

namespace App\Http\Controllers;
use App\course;
use App\school;
use App\User;

use Illuminate\Http\Request;

class AunthenticationController extends Controller
{
  public function register(Request $request){

      $validated_data  = $request->validate([
          'name'=>'required|max:55',
          'email'=>'required',
          'school'=>'required',
          'username'=>'required',
          'course'=>"required",
          'password'=>'required|confirmed'
      ]);

      $validated_data['password'] = bcrypt($request->password);

      $user = User::create($validated_data);

      $accessToken = $user->createToken('authtoken')->accessToken;

      return response(['user'=>$user,'accesstoken'=>$accessToken]);
  }

  public function login(Request $request){

      $loginData = $request -> validate([
          'email'=>'email|required',
          'password'=>'required'
      ]);


      if(!auth()->attempt($loginData)){
        return response(['message'=>'Invalid Credentials']);
      }

      $accessToken = auth()->user()->createToken('authtoken')->accessToken;

      return response(['user'=>auth()->user(),'accesstoken'=>$accessToken]);

  }

  public function getSchools(){

     return  school::all();

  }

    public function getCourse(){

      return course::all();
    }

    }
