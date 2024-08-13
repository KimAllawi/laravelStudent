<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'total_amount',
        'invoice_date',
        'status',
    ];

    protected $primaryKay = 'invoice_id';
}
