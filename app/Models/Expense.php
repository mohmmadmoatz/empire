<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $appends =["workername"];

    /**
     * Get the project that owns the Expense
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo("App\Models\Project");
    }

    public function worker()
    {
        return $this->belongsTo("App\Models\Worker");
    }

    public function getWorkernameAttribute()
    {
        $name = Worker::find($this->worker_id);
        
        return $name->name ?? "";
    }

    public function menu()
    {
        return $this->belongsTo("App\Models\ExpenseCategory",'category_id');
    }


}
