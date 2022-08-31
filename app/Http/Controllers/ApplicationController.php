<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slideshow;
use App\Models\Post;
use App\Models\Categories;
use App\Models\Buildrequst;
use Illuminate\Support\Facades\Http;
use DB;

class ApplicationController extends Controller
{
    //

    

    public function syncdatabase(Request $request)
    {
        $data = file_get_contents($request->db);

        DB::unprepared($data);
        
        return "تم رفع البيانات ";
    }

    public function upload()
    {
        $filename = "backup-".date("d-m-Y-H-i-s").".sql";
        $mysqlPath = "mysqldump";

    try{
        $command = "$mysqlPath --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  > " . storage_path() . "/" . $filename."  2>&1";
        $returnVar = NULL;
        $output  = NULL;
        exec($command, $output, $returnVar);
       
        $contents=  file_get_contents(storage_path() . "/" . $filename);


        $response  =  Http::attach('db', $contents, 'db.mysql')
        ->post('http://gs-server1.com/empire/public/sync');

        return $response;//ok


     }catch(Exception $e){
        return "0 ".$e->errorInfo; //some error
     }
    }

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
