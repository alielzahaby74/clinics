<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory /* , */;

    protected $fillable = ['doctor_id', 'branch_id', 'day', 'from', 'to', 'type', 'max_reservation', 'duration'];
    protected $with = ['doctor', 'branch'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}

