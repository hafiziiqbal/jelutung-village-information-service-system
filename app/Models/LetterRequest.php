<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterRequest extends Model
{
    use HasFactory;
    protected $casts = [
        'value' => 'array'
    ];
    protected $fillable = [
        'letter_template',
        'value',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
