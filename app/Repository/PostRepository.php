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

    public function getById($id)
    {
        return $this->postModel->find($id);
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

    public function updatePost($postId, $fieldNames, $data)
    {
        $post = $this->postModel->find($postId);

        foreach ($fieldNames as $key => $name) {
            $post->{$name} = $data[$key];
        }

        return $post->save();
    }

    public function deletePost($postId)
    {
        $post = $this->postModel->find($postId);
        $post->delete();
    }
}