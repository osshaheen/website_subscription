<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class postSendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $emailList;
    /**
     * Create a new job instance.
     */
    public function __construct($emailList)
    {
        $this->emailList = $emailList;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $emailList = $this->emailList->count() ? $this->emailList->pluck('email_address')->toArray() : [];
        $emailListFullCollection = $this->emailList;
        Mail::send("postEmail", $this->emailList[0]->post->toArray(), function ($message) use ($emailList,$emailListFullCollection) {
            $message->to($emailList)
                ->subject($emailListFullCollection[0]->post->title);
//            $message->from("", "Islam Abu Salem");
        });
    }
}
