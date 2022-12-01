<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'image', 'users_id', 'categories_id'
    ];
    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }


    public function Category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}