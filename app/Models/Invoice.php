<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'user_id',
        'transaction_id',
        'total',
        'discount',
        'payable',
        'val_id',
        'payment_status',
        'payment_method',
        'order_status',
        'refund_status',
        'refund_trans_id',
    ];

    public function invoiceOrders()
    {
        return $this->hasMany(InvoiceOrder::class);
    }

}
