<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'weight',
        'size',
        'colors',
        'image',
        'description',
        'price',
        'sale_price',
        'product_code',
        'product_sku',
        'tag',
        'stock',
        'status',
        'slug',
        'meta_title',
        'meta_description',
    ];

    protected $hidden = ['created_at', 'deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function invoiceOrders()
    {
        return $this->hasMany(InvoiceOrder::class);
    }
}
