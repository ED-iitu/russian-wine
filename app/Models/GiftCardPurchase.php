<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftCardPurchase extends Model
{
    protected $fillable = [
        'amount', 'name', 'email', 'phone', 'status', 'payment_id', 'card_number'
    ];
}
