<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use SoftDeletes;
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

    public function tags()
    {
        return $this->belongsToMany(\App\Tag::class);
    }

    protected static function booted()
    {
        // static::addGlobalScope('active', function (Builder $builder) {
        //     $builder->where('status', 1);
        // });
    }

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getFootnoteAttribute()
    {
        return $this->type . ' Type, created at '. date('Y-m-d', strtotime($this->created_at));
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getThumbnailAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        return asset('storage/thumbnail.jpg');
    }
}
