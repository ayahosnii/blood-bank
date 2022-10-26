<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = ['name_en', 'name_ar'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
