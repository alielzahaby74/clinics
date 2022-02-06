<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    public function add()
    {
        return view("dash.medicalHistories.add");
    }
}
