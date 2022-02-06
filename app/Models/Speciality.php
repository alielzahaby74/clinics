<?php

namespace App\Models;

use App\Models\Common\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'desc', 'case_time'];
    protected $with = ['photo'];
    public function branches()
    {
        return $this->belongsToMany(Branch::class, 'branch_speciality');
    }

    public function photo () {
        return $this->hasOne(File::class,'model_id','id')->where('model','speciality');
    }

}
