<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Review;

class Game extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'image',
        'screenshots',
        'trailer_url',
        'price',
        'description',
        'featured',
        'latest_games',
        'status',
    ];

    protected $casts = [
        'screenshots'  => 'array',
        'featured'     => 'boolean',
        'latest_games' => 'boolean',
        'status'       => 'boolean',
        'price'        => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    // Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // ⭐ Reviews (THIS FIXES YOUR ISSUE)
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /*
    |--------------------------------------------------------------------------
    | AUTO SLUG
    |--------------------------------------------------------------------------
    */

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($game) {

            if (empty($game->slug)) {
                $game->slug = Str::slug($game->title);
            }
        });

        static::updating(function ($game) {

            if ($game->isDirty('title')) {
                $game->slug = Str::slug($game->title);
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeActive(Builder $query)
    {
        return $query->where('status', true);
    }

    public function scopeFeatured(Builder $query)
    {
        return $query->where('featured', true);
    }

    public function scopeLatestGames(Builder $query)
    {
        return $query->where('latest_games', true);
    }

    public function scopePopularGames(Builder $query)
    {
        return $query->where('popular_games', true);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    // Image URL
    public function getImageUrlAttribute()
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('images/no-image.png');
    }

    // YouTube Embed URL
    public function getTrailerEmbedAttribute()
    {
        if (!$this->trailer_url) {
            return null;
        }

        preg_match(
            '/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&]+)/',
            $this->trailer_url,
            $matches
        );

        return isset($matches[1])
            ? 'https://www.youtube.com/embed/' . $matches[1]
            : null;
    }
}