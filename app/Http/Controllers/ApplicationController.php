<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slideshow;
use App\Models\Post;
use App\Models\Categories;
use App\Models\Buildrequst;

class ApplicationController extends Controller
{
    //

    public function homePage()
    {
        $slideshow = Slideshow::get();
        return response()->json(['success'=>true,'slideshow'=>$slideshow]);
    }
    public function getcat(){


        $data = Categories::get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
        
        
    }

    public function getPosts()
    {
        $posts = Post::where('ishome',1)->simplePaginate(500);
        return response()->json(['success'=>true,'data'=>$posts]);
    }
    public function getPostscategory($id)
    {
        $posts = Post::where('catid',$id)->get();
        return response()->json(['success'=>true,'data'=>$posts]);
    }
    public function store(Request $request){

        $data = new Buildrequst();
        $data->name	 = $request->name;
      $data->description	 = $request->description;
      $data->adress	 = $request->adress;
      $data->phone	 = $request->phone;
      $data->area	 = $request->area;
      $data->sundirction	 = $request->sundirction;
      $data->numberofspace	 = $request->numberofspace;
      $data->numberofflower	 = $request->numberofflower;

      

        if ($data->save())
        return response()->json([
            'success' => true,
        ]);
    else
        return response()->json([
            'success' => false,
            'message' => 'could not added'
        ], 500);

    }
 
}
