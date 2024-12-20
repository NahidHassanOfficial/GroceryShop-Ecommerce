<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'status',
        'meta_title',
        'meta_description',
    ];

    protected $hidden = ['created_at', 'deleted_at'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
