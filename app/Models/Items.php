<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'img',
        'quantity',
        'minbudget',
        'maxbudget',
        'form_id'

    ];

    public function getrequestuser()
    {
        return $this->belongsTo(forms::class,'form_id', 'id');
    }
}
