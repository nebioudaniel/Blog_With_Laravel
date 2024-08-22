<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any posts.
     */
    public function viewAny(User $user)
    {
        // Optionally, you can implement logic to determine if the user can view all posts.
        return true; // Allow all authenticated users to view posts.
    }

    /**
     * Determine whether the user can view a specific post.
     */
    public function view(User $user, Post $post)
    {
        // Allow all authenticated users to view posts.
        return true; // Adjust if needed to restrict access.
    }

    /**
     * Determine whether the user can create posts.
     */
    public function create(User $user)
    {
        // Allow all authenticated users to create posts.
        return true; // Adjust if needed.
    }

    /**
     * Determine whether the user can update the post.
     */
    public function update(User $user, Post $post)
    {
        // Only the user who created the post can update it.
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the post.
     */
    public function delete(User $user, Post $post)
    {
        // Only the user who created the post can delete it.
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can restore the post.
     */
    public function restore(User $user, Post $post)
    {
        // You can implement logic here if you want to allow users to restore posts.
        return false; // Assuming you don't want to allow restore.
    }

    /**
     * Determine whether the user can permanently delete the post.
     */
    public function forceDelete(User $user, Post $post)
    {
        // You can implement logic here if you want to allow users to permanently delete posts.
        return false; // Assuming you don't want to allow permanent delete.
    }
}
