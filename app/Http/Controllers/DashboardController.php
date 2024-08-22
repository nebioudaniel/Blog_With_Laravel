<?php 
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch posts related to the authenticated user
        $posts = Post::where('user_id', auth()->id())->get();

        return view('dashboard', compact('posts'));
    }
}
