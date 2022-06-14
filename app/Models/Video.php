<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $dates = [
        'converted_for_downloading_at',
        'converted_for_streaming_at',
    ];

    protected $guarded = [];

    protected $appends = [
        'size_mb',
    ];

    public function getSizeMBAttribute()
    {
        return (round($this->size /(1024*1024))) .'mb';
    }
}
