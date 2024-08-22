<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id'];

    // Relationship to the user who liked the post and set his or her info
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to the liked post show who liked or by who it liked
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
