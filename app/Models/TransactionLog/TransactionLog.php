<?php

namespace App\Models\TransactionLog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'service_order_id',
        'event',
        'event_status',
        'response_message'
    ];

    public function serviceOrder() {
        $this->belongsTo('App\Models\ServiceOrder', 'service_order');
    }
}
