<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{

    protected $table = 'donation_requests';
    protected $fillable = ['patient_name', 'patient_age', 'blood_type_id', 'bags_num', 'hospital_name',
                            'hospital_address', 'city_id', 'patient_phone', 'details', 'latitude',
                            'longitude', 'client_id'];
    public $timestamps = true;

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class, 'blood_type_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }



    public function notification()
    {
        return $this->hasOne(Notification::class);
    }

}
