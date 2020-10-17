<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'seller_id', 
        'product_name', 
        'quantity', 
        'unit', 
        'price', 
        'category', 
        'purchased', 
        'no_of_images', 
        'remainder', 
        'status'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function productImages() {
        return $this->hasMany('App\Models\Products\ProductImages');
    }
}
