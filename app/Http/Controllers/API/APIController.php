<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

use function Pest\Laravel\get;

class APIController extends Controller
{
    function showAllPost(){
        return Post::with('category', 'user')->get();
    }

    function showAllCategory(){
        return Category::all();
    }
}
