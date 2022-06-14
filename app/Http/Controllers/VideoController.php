<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Jobs\ConvertVideoForStreaming;
use App\Http\Requests\StoreVideoRequest;
use App\Jobs\ConvertVideoForDownloading;

class VideoController extends Controller
{
    public function store(StoreVideoRequest $request)
    {
        $video = Video::create([
            'disk'          => 'videos_disk',
            'original_name' => $request->video->getClientOriginalName(),
            'size'          => $request->video->getSize(),
            'path'          => $request->video->store('videos', 'videos_disk'),
            // 'title'         => $request->title,
        ]);

        $this->dispatch(new ConvertVideoForDownloading($video));
        // $this->dispatch(new ConvertVideoForStreaming($video));

        return response()->json([
            'id' => $video->id,
        ], 201);
    }
}
