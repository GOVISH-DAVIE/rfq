<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        "item_id",
        "uuid",
        "price",
        'vendorname',
        'vendoremail'
    ];

    public function item()
    {
        return $this->belongsTo(Items::class);
    }
}
