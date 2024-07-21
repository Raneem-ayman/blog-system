<?php

namespace App\Console\Commands;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class PublishScheduledNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:publish-scheduled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish scheduled news items';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('PublishScheduledNews job started.');
        $now = Carbon::now('Africa/Cairo')->addHour();
        $newsItems = News::where('published_at',null)
        ->where('publish_at','<',$now->toDateTimeString())
                         ->get();
        if ($newsItems->isEmpty()) {
            Log::info('No news items to publish.');
        }

        foreach ($newsItems as $news) {
            try {
                $news->update(['published_at' => Carbon::now()]);
                $this->info('Published: ' . $news->title);
                Log::info('Published: ' . $news->title);
            } catch (\Exception $e) {
                Log::error('Failed to publish news: ' . $news->title . ' - ' . $e->getMessage());
            }
        }

        Log::info('PublishScheduledNews job completed.');
    }
}
