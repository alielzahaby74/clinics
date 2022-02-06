<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address'];

    public function specialities()
    {
        return $this->belongsToMany(Speciality::class, 'branch_speciality');
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
