<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Detail;

class UserController extends Controller
{



    public function index(){
        $url=url('/login');
        $data=compact('url');
        return view('login')->with($data);
    }
     public function store(Request $request) {
    
        $detail=new Detail;
        $detail->email=$request['email'];
        $detail->password=md5($request['password']);
        $detail->save();
        $request->validate(
            [
             'email'=>'required|email',
             'password'=>'required|min:4'
             ]
        );
        return redirect('/upload');

     }
}
