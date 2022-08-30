<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeExp extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table = "office_expenses";
}
