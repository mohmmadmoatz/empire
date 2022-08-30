<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\OnlyCustomerScope;

class Customer extends Model
{
    use HasFactory;
    protected $guarded=[];     
    protected $table = "users";
    
    protected static function booted()
    {
        static::addGlobalScope(new OnlyCustomerScope);
    }
}
