<?php

namespace App\Repository;

use App\Models\Rating;

class RatingRepository
{
    public $ratingModel;

    public function __construct(Rating $rating)
    {
        $this->ratingModel = $rating;
    }

    public function getRatingByPostId($postId)
    {
        return $this->ratingModel->where('post_id', $postId)->get();
    }

    public function addRating(array $data)
    {
        $this->ratingModel->create([
           'post_id' => $data['post_id'],
           'score' => $data['score'],
        ]);
    }
}