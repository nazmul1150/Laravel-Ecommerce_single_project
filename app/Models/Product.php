<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    // protected $fillable = [
    //     'name',
    //     'slug',
    //     'sort_description',
    //     'long_description',
    //     'regular_price',
    //     'sale_price',
    //     'sku',
    //     'stock_status',
    //     'featured',
    //     'quantity',
    //     'image',
    //     'images',
    //     'category_id',
    // ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class,'product_id');
    }

}
