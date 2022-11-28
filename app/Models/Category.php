<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Category extends Model implements Authenticatable
{
    use AuthenticableTrait;
    use SoftDeletes;

    protected $fillable = [
        'name', 'users_id'
    ];

    protected $hidden = [];

    public function articles()
    {
        return $this->hasMany(Article::class, 'categories_id', 'id');
    }
}