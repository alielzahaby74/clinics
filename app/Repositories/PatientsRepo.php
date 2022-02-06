<?php


namespace App\Repositories;


use App\Models\Patient;
use App\Repositories\Base\BaseRepository;

class PatientsRepo extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Patient();
    }
}
