<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = ['title', 'image', 'content', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

}
