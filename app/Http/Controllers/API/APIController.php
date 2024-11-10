<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class APIController extends Controller
{
    function showAllPost(){
        return Post::all();
    }

    function showAllCategory(){
        return Category::all();
    }
}
