<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'type', 'status'
    ];

    // protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
