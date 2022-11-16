<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\PaymentFactory::new();
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'payment_id');
    }
}
