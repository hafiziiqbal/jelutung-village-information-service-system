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
        'user_id',
        'letter_template',
        'value',
    ];
    protected $hidden = [

        'updated_at'
    ];

    public function letter()
    {
        return $this->belongsTo(LetterTemplate::class, 'letter_template', 'id')->select(['id', 'name']);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->select(['id', 'nik']);
    }
}
