<?php


namespace App\Services;


use App\Repositories\BranchesRepo;

class BranchesService
{
    private $branchesRepo;

    public function __construct()
    {
        $this->branchesRepo = new BranchesRepo();
    }

    public  function getAll()
    {

        return $this->branchesRepo->all();
    }

    public function pagination($num = 10)
    {
        return $this->branchesRepo->pagination($num);
    }
    public function create($data)
    {
        return $this->branchesRepo->create($data);
    }

    public  function find($id)
    {
        return $this->branchesRepo->find($id);
    }

    public function update($id, $request)
    {
        $data = $request->validated();
        return $this->branchesRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->branchesRepo->delete($id);
    }
}
