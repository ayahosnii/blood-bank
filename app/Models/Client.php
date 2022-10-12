<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
    use HasApiTokens;

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = ['name', 'email', 'd_o_b', 'last_donation_date', 'blood_type_id','governorate_id', 'city_id', 'phone', 'password'];
    protected $appends = ['thumbnail_full_path', 'is_favourite'];

    protected $hidden = [
        'password',
        'api_token'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function setThumbnailFullPathAttribute()
    {
        return asset($this->thumbnail);
    }

    public function setIsFavouriteAttribute()
    {
        $favourite = request()->user()->whereHas('favourites', function($query){

        });
    }

    public function governoration()
    {
        return $this->belongsToMany(Governorate::class, 'governorate_id');
    }

    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function blood_type()
    {
        return $this->belongsTo('App\Models\BloodType', 'blood_type_id');
    }

    public function donate_request()
    {
        return $this->hasMany('DonationRequest');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

}
