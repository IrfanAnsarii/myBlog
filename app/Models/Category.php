<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Ensure this is imported
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Allow mass assignment for the 'name' field
    protected $fillable = ['name'];

    /**
     * Define the relationship with the Post model.
     * A category can have many posts.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
