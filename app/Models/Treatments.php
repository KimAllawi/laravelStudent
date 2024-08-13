<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatments extends Model
{
    use HasFactory;

    protected $fillable = [

        'treatment_id',
        'appointment_id',
        'treatment_type',
        'description',
        'cost',
        'treatment_date',
    ];

    protected $primaryKey = 'treatment_id';
}
