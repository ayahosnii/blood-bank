<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = ['subject', 'message', 'email', 'client_id'];


    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }
}
