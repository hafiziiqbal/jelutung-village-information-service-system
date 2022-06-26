<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_number',
        'address',
        'rt_rw',
        'zip_code',
        'village',
        'districts',
        'city',
        'province',
        'out_date',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
