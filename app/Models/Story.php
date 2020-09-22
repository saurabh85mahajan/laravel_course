<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\StoryCreated;
use App\Events\StoryEdited;

class Story extends Model
{
    use SoftDeletes, HasFactory;
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
        return $this->belongsTo(\App\Models\User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class);
    }

    protected static function booted()
    {
        // static::addGlobalScope('active', function (Builder $builder) {
        //     $builder->where('status', 1);
        // });

        static::created( function( $story) {
            event(new StoryCreated($story->title));
        });

        static::updated( function( $story) {
            event(new StoryEdited($story->title));
        });
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

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeWhereCreatedThisMonth($query)
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
        return $query->whereBetween('created_at', [$startDate, $endDate]);
    }
}
