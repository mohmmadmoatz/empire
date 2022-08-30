<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function getImagesAttribute($value)
    {
        $images = json_decode($value);
        for ($i=0; $i < count($images); $i++) { 
            if(!str_starts_with($images[$i],'http'))
            $images[$i] =  asset('storage/'.$images[$i]);
        }

        return $images;
       
     

    }
    protected $casts = [
        'images' => 'array',
        'created_at' => 'datetime:Y-m-d'
    ];
	 protected $guarded = [];  

}
