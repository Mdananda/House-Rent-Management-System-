<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderproperty extends Model
{
    use HasFactory;


    protected $fillable = [
        'propertyname',
        'quantity',
        
        'price',
        'name',
        'phone',
        'address',
    ];
}
