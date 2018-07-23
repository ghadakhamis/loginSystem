<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageStoreRequest;
use App\Image;

class ImagesController extends Controller
{
    public function create(){
        return view('images.create');
    }

    public function store(ImageStoreRequest $request){
        $image=$request->file('image');
        $path=$image->store('public/images');
        $splitPath=explode('/', $path, 3);
        $request['image']="storage/".$splitPath[1]."/".$splitPath[2];
        Image::create([
            'name' => $request['name'],
            'image' => $request['image']
        ]);
        return redirect('/home'); 
    }
}
