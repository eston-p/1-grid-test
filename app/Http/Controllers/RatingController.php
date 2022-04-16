<?php

namespace App\Http\Controllers;

use App\Repository\RatingRepository;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public $ratingRepository;

    public function __construct(RatingRepository $repository)
    {
        $this->ratingRepository = $repository;
    }
}
