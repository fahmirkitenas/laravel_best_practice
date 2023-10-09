<?php

namespace App\Repositories;

use App\Models\Tweet;
use Illuminate\Support\Facades\Cache;

class TweetRepository
{
    public function getAll()
    {
        return Cache::remember('getAllTweet', now()->addMinutes(10), function () {
            try {
                $data = Tweet::all();
                \Log::info('Executing cache closure.');
                return $data;
            } catch (\Exception $e) {
                \Log::error('Error occurred: ' . $e->getMessage());
                return [];
            }
        });
    }
}