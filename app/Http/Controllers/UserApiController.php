<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserApiController extends Controller
{
    public function showUser($id=null)
    {
      if($id=='')
      {
        $users = User::get();
        return response()->json(['users'=>$users],200);
      }
      else
      {
        $users = User::find();
        return response()->json(['users'=>$users],200);
      }
    }
    public function addUser(Request $request)
    {
      if($request->isMethod('post'))
      {
        $data = $request->all();
        // return $data;
        $post = new User();
        $rules = [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ];
        $customMessage = [
             'name.required'=>'Name is Requeired',
             'email.required'=>'Email is Requeired',
              'email.email'=>'Email must be email',
              'password.required'=>'Password is Requeired',
        
            ];
            $validator = Validator::make($data,$rules,$customMessage);
            if($validator->fails())
            {
              return response()->json($validator->errors(),422);
            }   

        $post->name = $data['name'];
        $post->email  = $data['email'];
        $post->password = bcrypt($data['password']);
        $post->save();
        $message = 'Your post is successfully';

        return response()->json(['message'=>$message],201);
      }

    }
}
