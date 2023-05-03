<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class createNewSubscribeToWebsite extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'subscription_id'=>$this->id,
            'email_address'=>$this->email_address,
            'website_id'=>$this->website_id,
            'website_name'=>$this->website_name
        ];
    }
}
