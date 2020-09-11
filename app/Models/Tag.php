<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    public function stories() 
    {
        return $this->belongsToMany(App\Models\Story::class);
    }
}
