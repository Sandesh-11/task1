<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'status' => '|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload
            $filename = time() . '.' .$request->file('photo') ->getClientOriginalExtension();
            echo $request->file('photo')->storeAs('public/uploads', $filename);

            $post=new Upload;
            $post->status=$request['status'];
            $post->photo_path = 'public/uploads/' . $filename; 
            $post->save();
            return redirect('/posts');
            

        
           
    }
        

        
    
    public function landing(){
        $uploads= Upload::all();
        return view('upload-view', compact('uploads'));
    }


    public function edit($id)
    {
        $post=Upload::find($id);
        if(is_null($post)){
            return redirect('/posts');
            }else{
                $url=url('/posts/update')."/".$id;
                return redirect('/posts/update');
            }
        
    }
}





