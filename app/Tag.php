<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    public function stories() 
    {
        return $this->belongsToMany(App\Story::class);
    }
}
