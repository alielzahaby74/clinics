<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'country_id'];

    protected $hidden = ['created_at', 'updated_at'];
}
