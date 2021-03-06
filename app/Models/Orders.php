<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'ordernumber', 
        'amount',
        'quotations_id',
        // 'CheckoutRequestID',
        'completed',
        'PhoneNumber'
    ];
    public function quotation()
    {
        return $this->belongsTo(Quotation::class, 'ordernumber', 'uuid');
    }
}
