<?php

namespace App\Models;

use App\Attributes\CollectedBy;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[CollectedBy(VideoCollection::class)]
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
        // return new VideoCollection($models);
        $reflector = new \ReflectionClass($this);
        $attributes = ($reflector->getAttributes(CollectedBy::class));

        if (count($attributes) && count($attributes[0]->getArguments())) {
            $collection = $attributes[0]->getArguments()[0];

            return new $collection($models);
        }

        return new Collection($models);
    }
}
