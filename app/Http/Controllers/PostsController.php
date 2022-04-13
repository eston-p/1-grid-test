<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public $postRepository;

    public function __construct(\App\Repository\PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function get()
    {
        return $this->postRepository->getAll();
    }

    public function create(StorePostRequest $request)
    {
        $validated = $request->validate();

        $this->postRepository->createPost([
            'user_id' => Auth::user()->id,
            'title' => $validated->safe()->only('title'),
            'text' => $validated->safe()->only('text'),
        ]);
    }

    public function update(Request $request, $postId)
    {
        $title = $request->input('title');
        $body = $request->input('body');

        $dataToUpdate = $title ?? $body;
        $fieldName = $title !== null ? 'title' : 'body';

        $this->postRepository->updatePost($postId, $fieldName, $dataToUpdate);
    }

    public function delete($postId)
    {
        $this->postRepository->deletePost($postId);
    }

}
