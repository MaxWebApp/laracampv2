<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    // 如果是多對多關係
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    // 如果是一對多關係
    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }
}
