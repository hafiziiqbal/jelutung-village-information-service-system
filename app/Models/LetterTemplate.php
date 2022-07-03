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

    public function letterRequest()
    {
        return $this->hasMany(LetterRequest::class, 'letter_template');
    }
}
