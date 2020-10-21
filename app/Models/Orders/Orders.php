<?php

namespace App\Models\Orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'buyer_id', 'order_name', 'order_category',
        'quantity', 'order_category_type_id', 'status',
        'quantity_unit', 'serviced', 'remainder',
    ];

    public function category() {
        return $this->belongsTo('App\Models\Categories\Categories', 'order_category');
    }

    public function categoryType() {
        return $this->belongsTo('App\Models\Categories\CategoryTypes', 'order_category_type_id');
    }
}
