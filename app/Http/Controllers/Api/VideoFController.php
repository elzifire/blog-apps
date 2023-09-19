<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use App\Models\Video;
use App\Models\VideoF;

class VideoFController extends Controller
{
    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $videos = VideoF::latest()->paginate(4);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Video"
            ],
            "data" => $videos
        ], 200);
    }
    
    /**
     * VideoHomePage
     *
     * @return void
     */
    public function VideoHomePage()
    {
        $videos = VideoF::latest()->take(2)->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Video Homepage"
            ],
            "data" => $videos
        ], 200);
    }
}