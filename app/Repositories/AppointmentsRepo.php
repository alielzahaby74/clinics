<?php


namespace App\Repositories;


use App\Models\Appointment;
use App\Repositories\Base\BaseRepository;

class AppointmentsRepo extends BaseRepository
{

    public function __construct()
    {
        $this->model = new Appointment();
    }

}
