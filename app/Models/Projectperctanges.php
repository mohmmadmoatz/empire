<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projectperctanges extends Model
{
    use HasFactory;
    protected $table = 'projectperctanges';
    protected $guarded = [];
    /**
     * Get the project that owns the Projectperctanges
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    
}
