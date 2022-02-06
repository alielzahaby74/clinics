<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
