<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challan extends Model
{
    use HasFactory;

    protected $fillable = [
        'challan_number',
        'bill_number',
        'customer_name',
        'issue_date',
        'description',
    ];

    protected $casts = [
        'issue_date' => 'date',
    ];
}
