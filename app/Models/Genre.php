<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Genre extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'moviedb_id', 
        'name', 
    ];
}
