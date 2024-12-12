<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class VideoCollection extends Collection
{
    public function groupByRelativeDate()
    {
        return $this->groupBy(function (Video $video) {
            return match (true) {
                $video->published_at->isToday() => 'today',
                $video->published_at->isYesterday() => 'yesterday',
                $video->published_at->isLastWeek() => 'last week',
                default => 'other',
            };
        });
    }
}
