<?php

namespace App\Console\Commands;

use App\Jobs\postSendEmail;
use App\Models\PostSubscriber;
use Illuminate\Console\Command;

class sendPostEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sending post email notifications';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $subscriperList = PostSubscriber::with(['post','subscriber'])
            ->where('is_sent',0)
            ->get();
        if (!empty($subscriperList)) {
            $job = new postSendEmail($subscriperList);
            dispatch($job)->delay(now()->addMinutes(1));
        }
    }
}
