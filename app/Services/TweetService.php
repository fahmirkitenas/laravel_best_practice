<?php

namespace App\Services;

use App\Repositories\TweetRepository;
use Illuminate\Support\Facades\Cache;

class TweetService 
{
    protected $tweetRepository;

    public function __construct(TweetRepository $tweetRepository)
    {
        $this->tweetRepository = $tweetRepository;
    }

    public function getAllTweet()
    {
            // Logika bisnis untuk mendapatkan semua tweet
            return $this->tweetRepository->getAll();
    }
}