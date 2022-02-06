<?php

namespace App\Models;


use App\Models\Common\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Doctor extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'phone',
        'speciality_id'
    ];

    protected $with = ['photo','speciality'];

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }

    public function photo () {
        return $this->hasOne(File::class,'model_id','id')->where('model','doctor');
    }

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
