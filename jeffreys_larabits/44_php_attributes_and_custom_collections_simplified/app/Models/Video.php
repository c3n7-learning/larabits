<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /** @use HasFactory<\Database\Factories\VideoFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'video_path',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function newCollection(array $models = [])
    {
        return new VideoCollection($models);
    }
}
