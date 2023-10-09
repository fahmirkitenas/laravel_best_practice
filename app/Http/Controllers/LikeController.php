<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TweetService;
use App\Services\LikeService;

class LikeController extends Controller
{
    protected $tweetService;
    protected $likeService;

    public function __construct(TweetService $tweetService, LikeService $likeService)
    {
        $this->tweetService = $tweetService;
        $this->likeService = $likeService;
    }
}
