<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;
    protected $fillable = ['email_address','website_id'];
    public function website(){
        return $this->belongsTo(Website::class);
    }
    public function getWebsiteNameAttribute(){
        $website = $this->website;
        return $website ? $website->name : '';
    }
}
