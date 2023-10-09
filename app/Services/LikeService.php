<?php
namespace App\Services;

use App\Repositories\LikeRepository;

class LikeService
{
    protected $likeRepository;

    public function __construct(LikeRepository $likeRepository)
    {
        $this->likeRepository = $likeRepository;
    }

    public function likeTweet($userId, $tweetId)
    {
        // Logika bisnis untuk menambahkan suka pada tweet
        return $this->likeRepository->like($userId, $tweetId);
    }
}