<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{

    protected $table = 'governorates';
    public $timestamps = true;
    protected $fillable = ['name'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function client()
    {
        return $this->hasMany(Client::class);
    }



}
