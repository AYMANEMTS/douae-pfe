<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_name',
        'content',
        'rating',
        'author_image'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'rating' => 'integer'
    ];

    /**
     * Get the author image URL.
     *
     * @return string|null
     */
    public function getAuthorImageUrlAttribute()
    {
        if ($this->author_image) {
            return asset('storage/' . $this->author_image);
        }
        return null;
    }
}