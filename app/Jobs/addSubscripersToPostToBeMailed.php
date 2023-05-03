<?php

namespace App\Jobs;

use App\Models\PostSubscriber;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class addSubscripersToPostToBeMailed implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $post;
    /**
     * Create a new job instance.
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $websiteSubscriberIdList = Subscriber::select('id as subscriber_id',DB::raw($this->post->id .' as post_id'))
            ->where('website_id',$this->post->website_id )
            ->get()->toArray();
        PostSubscriber::insert($websiteSubscriberIdList);
    }
}
