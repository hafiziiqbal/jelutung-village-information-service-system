<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_number',
        'nik',
        'name',
        'gender',
        'birthplace',
        'birthday',
        'religion',
        'qualification',
        'type_of_work',
        'blood_group',
        'marital_status',
        'wedding_date',
        'family_relationship',
        'citizenship',
        'passport_number',
        'kitap_number',
        'father_name',
        'mother_name',
        'life_status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function familyCard()
    {
        return $this->belongsTo(FamilyCard::class, 'card_number', 'card_number');
    }
}
