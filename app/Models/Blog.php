<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Content
{
    use HasFactory;
    // Most variables are inherited from Content

    /* boot method to automatically generate and set the slug attribute before saving a new content post: */
    protected static function boot()
    {
        parent::boot();

        //the 'creating' event is used to generate the slug just before the blog post is saved to the database.It uses the Str::slug helper to create a URL-friendly slug based on the blog's title.
        /*static::creating(function ($content) {
            $content->slug = Str::slug($content->title);
        });*/
    }


}
