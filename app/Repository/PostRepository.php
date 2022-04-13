<?php

namespace App\Repository;

use App\Models\Posts;

class PostRepository
{
    public $postModel;

    public function __construct(Posts $posts)
    {
        $this->postModel = $posts;
    }

    public function getAll()
    {
        return $this->postModel->all();
    }

    public function createPost(array $data)
    {
        $this->postModel->create([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'text' => $data['text'],
        ]);
    }

    public function updatePost($postId, $fieldName, $data)
    {
        $post = $this->postModel->find($postId);
        $post->{$fieldName} = $data;
        $post->save();
    }

    public function deletePost($postId)
    {
        $post = $this->postModel->find($postId);
        $post->delete();
    }
}