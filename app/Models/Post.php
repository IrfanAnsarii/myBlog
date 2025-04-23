<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Ensure this is imported
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * Define the relationship with the Category model.
     * A post belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
