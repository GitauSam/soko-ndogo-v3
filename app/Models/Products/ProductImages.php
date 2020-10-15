<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id', 
        'user_id', 
        'status', 
        'image_name', 
        'image_url', 
        'is_thumbnail', 
        'saved_image_name'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function product() {
        return $this->belongsTo('App\Models\Products\Product');
    }
}
