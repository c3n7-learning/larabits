<?php

use App\Models\Video;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $videos = Video::all()->groupByRelativeDate();

    dd($videos);
});
