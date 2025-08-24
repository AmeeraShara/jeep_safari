<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = [
        'customer_id',
        'cardholder_name',
        'card_number',
        'expiry_month',
        'expiry_year',
        'cvv',
        'is_default'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
