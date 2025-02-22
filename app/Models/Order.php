<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $fillable = [
        'order_serial_no',
        'user_id',
        'tax',
        'discount',
        'subtotal',
        'total',
        'shipping_charge',
        'order_type',
        'order_datetime',
        'payment_method',
        'payment_status',
        'status',
        'reason',
        'source',
        'pos_payment_method',
        'pos_payment_note',
    ];

    protected $casts = [
        'id'                 => 'integer',
        'order_serial_no'    => 'string',
        'user_id'            => 'integer',
        'tax'                => 'decimal:6',
        'discount'           => 'decimal:6',
        'subtotal'           => 'decimal:6',
        'total'              => 'decimal:6',
        'shipping_charge'    => 'decimal:6',
        'order_type'         => 'integer',
        'order_datetime'     => 'datetime',
        'payment_method'     => 'integer',
        'payment_status'     => 'integer',
        'status'             => 'integer',
        'reason'             => 'string',
        'source'             => 'integer',
        'pos_payment_method' => 'integer',
        'pos_payment_note'   => 'string'
    ];

    public function orderProducts(): \Illuminate\Database\Eloquent\Relations\morphMany
    {
        return $this->morphMany(Stock::class, 'model');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
