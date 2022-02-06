<?php


namespace App\Repositories;


use App\Models\Branch;
use App\Repositories\Base\BaseRepository;

class BranchesRepo extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Branch();
    }
}
