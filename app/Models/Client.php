<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
    use HasApiTokens;

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = ['id', 'name', 'email', 'd_o_b', 'last_donation_date', 'blood_type_id',
                           'governorate_id', 'city_id', 'phone', 'password', 'activation', 'pin_code'];

    protected $appends = [/*'thumbnail_full_path',*/ /*'is_favourite'*/];

    protected $hidden = [
        'password',
        'api_token'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /*public function setThumbnailFullPathAttribute()
    {
        return asset($this->thumbnail);
    }*/

    public function setIsFavouriteAttribute()
    {
        $favourite = request()->user()->whereHas('favourites', function($query){

        });
    }

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function governorate()
    {
        return $this->belongsToMany(Governorate::class, 'client_governorate');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class, 'blood_type_id');
    }

    public function donationRequest()
    {
        return $this->hasMany(DonationRequest::class);
    }

    public function notifications()
    {
        return $this->belongsToMany(Notification::class);
    }



    public function favourites()
    {
        return $this->belongsToMany(Post::class);
    }

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }




}
