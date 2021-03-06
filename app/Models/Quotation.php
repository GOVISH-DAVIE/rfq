<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'vendorName',
        'vendorEmail',
        'itemId',
        'quote'
    ];

    public function getitem()
    {
        return $this->belongsTo(forms::class, 'itemId', 'id');
    }
}
