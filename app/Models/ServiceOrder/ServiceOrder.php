<?php

namespace App\Models\ServiceOrder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'process',
        'process_status',
        'transaction_status',
        'user_id',
        'user_email',
        'product_id',
        'order_id',
        'category_id',
        'category_types_id',
        'to_display',
        'display_message',
        'response_message'
    ];
}
