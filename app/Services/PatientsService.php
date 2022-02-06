<?php


namespace App\Services;


use App\Repositories\PatientsRepo;

class PatientsService
{
    private $patientsRepo;

    public function __construct()
    {
        $this->patientsRepo = new PatientsRepo();
    }

    public  function getAll()
    {

        return $this->patientsRepo->all();
    }

    public function pagination($num = 10)
    {
        return $this->patientsRepo->pagination($num);
    }
    public function create($request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        return $this->patientsRepo->create($data);
    }

    public  function find($id)
    {
        return $this->patientsRepo->find($id);
    }

    public function update($id, $request)
    {
        $data = $request->validated();
        return $this->patientsRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->patientsRepo->delete($id);
    }


}
