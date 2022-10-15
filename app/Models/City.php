<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = ['name', 'governorate_id', 'city_name_en', 'city_name_ar'];

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }

    public function client()
    {
        return $this->hasMany(Client::class);
    }

    public function donationRequest()
    {
        return $this->hasMany(DonationRequest::class);
    }

}
