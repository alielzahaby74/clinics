<?php


namespace App\Services;


use App\Repositories\DoctorsRepo;

class DoctorsService
{
    private $doctorsRepo;

    public function __construct()
    {
        $this->doctorsRepo = new DoctorsRepo();
    }

    public function getAll()
    {
        return $this->doctorsRepo->all();
    }

    public function pagination($num = 10)
    {
        return $this->doctorsRepo->pagination($num);
    }

    public function create($request)
    {
        $data = $request->validated();
        $data['speciality_id'] = $request['speciality'];
        $data['password'] = bcrypt($data['password']);
        return $this->doctorsRepo->create($data);
    }

    public function find($id)
    {
        return $this->doctorsRepo->find($id);
    }

    public function filter($request)
    {
        return $this->doctorsRepo->filter($request['filter_by'],  $request['filter_value']);
    }

    public function update($id, $request)
    {
        $data = $request->validated();
        if (!is_null($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        return $this->doctorsRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->doctorsRepo->delete($id);
    }
}
