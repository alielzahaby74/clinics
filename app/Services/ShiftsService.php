<?php


namespace App\Services;


use App\Models\Doctor;
use App\Repositories\ShiftsRepo;

class ShiftsService
{
    private $shiftsRepo;

    public function __construct()

    {
        $this->shiftsRepo = new ShiftsRepo();
    }

    public  function getAll()
    {
        return $this->shiftsRepo->all();
    }

    public function pagination($num = 10)
    {
        return $this->shiftsRepo->pagination($num);
    }

    public function create($request)
    {
        $data = $request->validated();
        $data['branch_id'] = $request['branch_id'];
        $data['doctor_id'] = $request['doctor_id'];
        $data['type'] = $request['type'];
        return $this->shiftsRepo->create($data);
    }

    public  function find($id)
    {
        return $this->shiftsRepo->find($id);
    }

    public function update($id, $request)
    {
        $data = $request->validated();
        return $this->shiftsRepo->update($id, $data);
    }

    public function filter($request)
    {
        if ($request->filter_by == "doctor")
        {
            $name = $request->filter_value;
            return $this->shiftsRepo->model->whereHas("doctor",function ($query) use ($name) {
                return $query->where("name",'LIKE',"%$name%");
            })->get();
        }

        return $this->shiftsRepo->model->where("from", '>=', $request->filter_value)->get();
    }

    public function delete($id)
    {
        return $this->shiftsRepo->delete($id);
    }

    public function getDoctorShifts($id)
    {
        return $this->shiftsRepo->model->where('doctor_id', $id)->get();
    }
}
