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
}