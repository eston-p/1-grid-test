<?php

namespace App\Http\Controllers;

use App\Repository\PostRepository;
use App\Repository\RatingRepository;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public $ratingRepository;
    public $postRepository;

    public function __construct(RatingRepository $repository, PostRepository $postRepository)
    {
        $this->ratingRepository = $repository;
        $this->postRepository = $postRepository;
    }

    public function store($postId, $score)
    {
        if (!isset($postId) && !isset($score)) {
            return false;
        }

        $post = $this->postRepository->getById($postId);
        $rating = $this->ratingRepository->getRatingByPostId($postId);

        if ($post && $rating) {
            $rating->score += $score;
            $rating->save();
        } else {
            $this->ratingRepository->addRating([
                'post_id' => $postId,
                'score' => $score,
            ]);
        }

        return redirect('/');
    }
}
