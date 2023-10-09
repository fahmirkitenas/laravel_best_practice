<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Services\TweetService;
use App\Services\LikeService;
use App\Helpers\CommonHelper;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

use Exception;

class TweetController extends Controller
{
    protected $tweetService;
    protected $likeService;

    public function __construct(TweetService $tweetService, LikeService $likeService)
    {
        $this->tweetService = $tweetService;
        $this->likeService = $likeService;
    }

    public function getAllCache()
    {
        $cachedData = Redis::get('tes_tweet');

        if ($cachedData) {
            // Data ditemukan di cache, lakukan sesuatu dengan $cachedData
            return CommonHelper::successResponse($cachedData);
        } else {
            // Data tidak ditemukan di cache
            return 'Data tidak ditemukan di cache.';
        }
    }

    public function getTweetDirect()
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

    public function getAllTweet()
    {
        try {
            $tweets = $this->tweetService->getAllTweet();
            return CommonHelper::successResponse($tweets);
        } catch(\Exception $e){
            Log::error('Error occured: ' . $e->getMessage());
            return CommonHelper::exceptionResponse();
        }
    }

    public function likeTweet(Request $request)
    {
        try {
            $userId = $request->input('user_id');
            $tweetId = $request->input('tweet_id');
            
            // Memanggil service untuk menambahkan suka pada tweet
            $isLiked = $this->likeService->likeTweet($userId, $tweetId);
            
            if($isLiked){
                return CommonHelper::successResponse(null, "Tweet liked successfully");
            } else {
                return CommonHelper::errorResponse('Failed to like the tweet');
            }
        } catch (\Exception $e){
            Log::error('Error occured: ' . $e->getMessage());
            return CommonHelper::exceptionResponse();
        }

    }
}
