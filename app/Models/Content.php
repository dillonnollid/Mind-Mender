<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * General Content Model that contains common attributes shared among different types of content
 * Such as title, description, author, and timestamps.
 * This class serves as the common point for associating different content types
 */
class Content extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'excerpt', 'user_id', 'slug'];

    /* define the polymorphic relationship using the morphTo method.
    This method specifies the name of the polymorphic relationship and the columns that will hold the type and ID of the related model.*/
    public function contentable()
    {
        return $this->morphTo();
    }

    // Define the user relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

/**
 * Create specific Models for different types of content e.g. Blog, Video, Podcast.
 * Use inheritance by extending the generic Content model
 * Polymorphic relationship, we're associating a model with multiple other models on a single association
 */

