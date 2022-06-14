<?php

use App\Http\Controllers\CompressedVideosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VideoCompresserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

// Route::post('video', [VideoController::class, 'store'])->name('video.store');
Route::get('/', [VideoCompresserController::class, 'index'])->name('video.index');
Route::post('video-upload', [VideoCompresserController::class, 'upload'])->name('video.upload');
Route::post('compress-video', [VideoCompresserController::class, 'compress'])->name('video.compress');
Route::get('compressed-videos', [CompressedVideosController::class, 'index'])->name('compressed-videos.index');
