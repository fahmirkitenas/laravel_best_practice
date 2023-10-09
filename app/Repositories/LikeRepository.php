<?php
namespace App\Repositories;

use App\Models\Like;

class LikeRepository
{
    public function like($userId, $tweetId)
    {
        // Logika untuk menambahkan suka pada tweet
        Like::create([
            'user_id' => $userId,
            'tweet_id' => $tweetId
        ]);

        return true;
    }
}

