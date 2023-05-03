<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSubscriber extends Model
{
    use HasFactory;
    protected $fillable = ['post_id','subscriber_id','is_sent'];
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function subscriber(){
        return $this->belongsTo(Subscriber::class);
    }
    public function getEmailAddressAttribute(){
        $subscriber = $this->subscriber;
        return $subscriber ? $subscriber->email_address : '';
    }
}
