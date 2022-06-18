<?php

namespace App\Listeners;

use App\Events\NewsViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewsViewedListener
{

    public function handle(NewsViewed $event)
    {
        $news = $event->news;
        $news->viewed_count = (int)$news->viewed_count + 1;
        $news->save();
    }
}
