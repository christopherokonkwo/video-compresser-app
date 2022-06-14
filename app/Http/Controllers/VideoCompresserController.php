<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class VideoCompresserController extends Controller
{
    public function index()
    {
        $videos  = Video::get();

        return view('index', compact('videos'));
    }

    public function upload(Request $request)
    {
        $video = Video::create([
            'disk'          => 'videos_disk',
            'original_name' => $request->video->getClientOriginalName(),
            'size'          => $request->video->getSize(),
            'path'          => $request->video->store('videos', 'videos_disk'),
            // 'title'         => $request->title,
        ]);

        return redirect()->route('video.index')->with('msg', "$video->original_name uploaded successfully!");
    }

    public function compress(Request $request)
    {
        // dd($request->request);
        $file = Storage::disk('videos_disk')->path($request->input('file_name'));
        $storage = storage_path('app/public/downloads');
        $timestamp = rand(10, 100);

        if (!is_null($request->bitrate)&&!is_null($request->frames) && !is_null($request->resolution)) {
            $bitrate = $request->input('bitrate');
            $frames = $request->input('frames', '24');
            $resolution = $request->input('resolution', '426x240');
            $path = "/video-bitrate-of-$bitrate-and-$frames-p-and-$resolution-$timestamp.mp4";
            $fullPath = "$storage/video-bitrate-of-$bitrate-and-$frames-p-and-$resolution-$timestamp.mp4";

            $command = "ffmpeg -i $file -c:a copy -c:v libx264 -b:v $bitrate -r $frames -s $resolution $fullPath";

            system($command);
            // Storage::disk('public')->size($pathToFile);

            return redirect()->route('video.index')
                ->with('result:size', $this->getSize($path))
                ->with('result:link', $this->getLink($fullPath));
        }

        // Command to reduce bitrate
        if (!is_null($request->bitrate)) {
            $bitrate = $request->input('bitrate');
            $path = "/video-bitrate-of-$bitrate-$timestamp.mp4";
            $fullPath = "$storage/video-bitrate-of-$bitrate-$timestamp.mp4";
            $command = "ffmpeg -i $file -c:a copy -c:v libx264 -b:v $bitrate $fullPath";

            system($command);

            return redirect()->route('video.index')
                ->with('result:size', $this->getSize($path))
                ->with('result:link', $this->getLink($path));
            // return "File has been converted in $storage";
        }

        // Command to reduce framerate
        if (!is_null($request->frames)) {
            $frames = $request->input('frames', '24') ;
            $path = "/video-frames-of-$frames-$timestamp.mp4";
            $fullPath = "$storage/video-frames-of-$frames-$timestamp.mp4";
            $command = "ffmpeg -i $file -c:a copy -c:v libx264 -r $frames $fullPath";

            system($command);

            return redirect()->route('video.index')
                ->with('result:size', $this->getSize($path))
                ->with('result:link', $this->getLink($path));
        }
        // Command to reduce resolution
        if (!is_null($request->resolution)) {
            $resolution = $request->input('resolution', '426x240') ;
            $path = "/video-resolution-of-$resolution-$timestamp.mp4";
            $fullPath = "$storage/video-resolution-of-$resolution-$timestamp.mp4";
            $command = "ffmpeg -i $file -c:a copy -c:v libx264 -s $resolution $fullPath";

            system($command);

            return redirect()->route('video.index')
                ->with('result:size', $this->getSize($path))
                ->with('result:link', $this->getLink($path));
        }
    }

    private function getSize($path)
    {
        $size = Storage::disk('public')->size("downloads$path");
        $data = $size/(1024*1024);

        return round($data) . 'mb';
    }
    private function getLink($path)
    {
        return Storage::disk('public')->url("downloads$path");
    }
}
