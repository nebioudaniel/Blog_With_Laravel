<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'photo', 'user_id'];

    // Define the relationship with likes
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    // Relationship to User (author of the post)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
