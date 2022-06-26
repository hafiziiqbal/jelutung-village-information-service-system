<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterTemplate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'letter_category',
        'need_for_letter',
        'document'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function letterCategory()
    {
        return $this->belongsTo(LetterCategory::class, 'letter_category', 'id');
    }

    public function needForLetter()
    {
        return $this->belongsTo(NeedForLetter::class, 'need_for_letter', 'id');
    }

    public function letterFormInput()
    {
        return $this->hasMany(LetterTemplate::class, 'letter_template');
    }
}
