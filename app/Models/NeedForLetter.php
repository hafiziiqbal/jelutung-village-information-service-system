<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeedForLetter extends Model
{
    use HasFactory;
    protected $fillable = [
        'need',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function letterTemplate()
    {
        return $this->hasOne(LetterTemplate::class, 'need_for_letter');
    }
}
