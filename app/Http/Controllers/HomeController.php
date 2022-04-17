<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $posts = Posts::query()->where('user_id', Auth::user()->id)->get();

        return view('dashboard',
            [
                'posts' => $posts
            ]
        );
    }
}
