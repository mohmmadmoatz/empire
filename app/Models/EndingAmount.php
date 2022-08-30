<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndingAmount extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function project()
    {
        return $this->belongsTo("App\Models\Project");
    }

    public function worker()
    {
        return $this->belongsTo("App\Models\Worker");
    }

    public function menu()
    {
        return $this->belongsTo("App\Models\Ending",'category_id');
    }
}
