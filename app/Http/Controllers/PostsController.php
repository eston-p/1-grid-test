<?php

namespace App\Http\Controllers;

use App\Repository\PostRepository;
use App\Repository\RatingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public $postRepository;
    public $ratingRepository;

    public function __construct(PostRepository $postRepository, RatingRepository $ratingRepository)
    {
        $this->postRepository = $postRepository;
        $this->ratingRepository = $ratingRepository;
    }

    public function get()
    {
        return view('home', [
            'posts' =>  $this->postRepository->getAll(),
            'rating' => $this->ratingRepository,
        ]);
    }

    public function create()
    {
        return view('posts.create-post');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        $this->postRepository->createPost([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'text' => $request->body,
        ]);

        return redirect('/');
    }

    public function updatePostView($postId)
    {
        $post = $this->postRepository->getById($postId);

        return view('posts.update-post', [ 'post' => $post ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        $title = $request->input('title');
        $body = $request->input('body');

        $dataToUpdate = [$title, $body];
        $fieldNames = ['title', 'text'];


        $this->postRepository->updatePost($id, $fieldNames, $dataToUpdate);

        return redirect('/dashboard');
    }

    public function delete($postId)
    {
        $this->postRepository->deletePost($postId);

        return redirect('/dashboard');
    }

}
