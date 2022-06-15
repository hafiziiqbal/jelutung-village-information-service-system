<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterFormInput extends Model
{
    use HasFactory;
    protected $fillable = [
        'letter_template',
        'name',
        'type',
        'options',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function letterTemplate()
    {
        return $this->belongsTo(LetterTemplate::class, 'letter_template', 'id');
    }
}
