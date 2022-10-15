<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'tokens';
    protected $fillable=['token','type','client_id'];
    public $timestamps = true;

    public function client(){

        return $this->belongsTo('App/Model/Client','client_id');
    }
}
