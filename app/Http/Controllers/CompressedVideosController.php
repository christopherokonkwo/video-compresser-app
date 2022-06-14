<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class CompressedVideosController extends Controller
{
    public function index()
    {
        $videos  = Video::get();

        return view('compressed-videos', compact('videos'));
    }

    public function show(Video $video)
    {
        return view('compressed-videos', compact('video'));
    }
}
