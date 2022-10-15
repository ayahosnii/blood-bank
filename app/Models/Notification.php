<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = ['title', 'content', 'donation_request_id'];

    public function donationRequest()
    {
        return $this->belongsTo(DonationRequest::class, 'donation_request_id');
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }

}
