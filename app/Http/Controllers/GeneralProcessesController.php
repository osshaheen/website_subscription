<?php

namespace App\Http\Controllers;

use App\Http\Requests\subscribeToWebsiteRequest;
use App\Http\Resources\createNewSubscribeToWebsite;
use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Http\Request;

class GeneralProcessesController extends Controller
{
    public function subscribeToWebsite(subscribeToWebsiteRequest $request,Website $website){
        $subscription = Subscriber::create([
            'email_address'=>$request->email_address,
            'website_id'=>$website->id
        ]);
        $subscription->load('website');
        return new createNewSubscribeToWebsite($subscription);
    }
}
