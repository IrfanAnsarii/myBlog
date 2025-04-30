<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Ensure this is imported
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Ensure this is imported
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str; // Import Str class

class Post extends Model
{
    use HasFactory;

    // The attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'content',
        'keywords',
        'slug',
        'image',
        'category_id',
        'views',
        'likes',
        'comments_count',
        'is_published',
        'published_at',
    ];






    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mutator for setting the slug
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    // Accessor for getting the URL of the image
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('images/default.jpg');
    }

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function approvedComments()
{
    return $this->hasMany(Comment::class)->where('approved', true);
}
}
