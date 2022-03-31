<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   
    function register(Request $req) {
        $user = new User;
        $user->name= $req->input('name');
        $user->email= $req->input('email');
        $user->username= $req->input('username');
        $user->password= Hash::make($req->input('password'));
        $user->save();
        return $user;
    }

    function login(Request $req) {
        $user= User::where('username', $req->username)->first();
        if(!$user || !Hash::check($req->password, $user->password)) {
            return ["error" => "username or password is incorrect"];
        }
        return $user;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return $user;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return "account successfully deleted";
    }



}
