<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'tokens';
    public $timestamps = true;
    protected $fillable = ['accountable_id','token','type', 'accountable_type'];

    public function accountable()
    {
        return $this->morphTo();
    }
}
