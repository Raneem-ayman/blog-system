<?php

namespace App\Jobs;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class PublishNews implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $news;
    /**
     * Create a new job instance.
     */
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (Carbon::now()->greaterThanOrEqualTo($this->news->publish_at)) {
            $this->news->update(['published_at' => Carbon::now()]);
            Log::info('Published: ' . $this->news->title);
        }

    }
}
