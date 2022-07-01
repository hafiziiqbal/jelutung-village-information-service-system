<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $guard_name = 'api';

    protected $fillable = [
        'id',
        'nik',
        'address',
        'profession_type',
        'marital_status',
        'email',
        'phone_number',
        'pin'
    ];

    protected $hidden = [
        'pin',
        'created_at',
        'updated_at'
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class, 'nik', 'nik');
    }

    public function name()
    {
        return $this->belongsTo(Resident::class, 'nik', 'nik')->select(['nik', 'name']);
    }
}
