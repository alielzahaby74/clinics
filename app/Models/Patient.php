<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'phone', 'address', 'birthdate', 'nationalId', 'photo', 'country_id',
                            'blood_group', 'rhesus', 'chronic_diseases', 'genetic_diseases', 'surgical_history', 'allergies_history',
                            'family_mecdical_history',];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
