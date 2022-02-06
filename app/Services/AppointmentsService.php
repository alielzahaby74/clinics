<?php


namespace App\Services;


use App\Repositories\AppointmentsRepo;
use App\Repositories\DoctorsRepo;
use App\Repositories\PatientsRepo;
use App\Repositories\ShiftsRepo;

class AppointmentsService
{
    private $appointmentRepo;
    private $patientsRepo;

    public function __construct()
    {
        $this->appointmentRepo = new AppointmentsRepo();
        $this->patientsRepo = new PatientsRepo();
    }

    public  function getAll()
    {
        return $this->appointmentRepo->all();
    }

    public function pagination($num = 10)
    {
        return $this->appointmentRepo->pagination($num);
    }
    public function create($data)
    {
        return $this->appointmentRepo->create($data);
    }

    public  function find($id)
    {
        return $this->appointmentRepo->find($id);
    }

    public function update($id, $request)
    {
        $data = $request->validated();
        return $this->appointmentRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->shifts->delete($id);
    }

    public function getPatient($national_id)
    {
        return $this->patientsRepo->model->where('nationalId', $national_id)->get();
    }

}
