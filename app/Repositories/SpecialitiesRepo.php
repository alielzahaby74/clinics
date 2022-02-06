<?php


namespace App\Repositories;


use App\Models\Speciality;
use App\Repositories\Base\BaseRepository;

class SpecialitiesRepo extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Speciality();
    }

}
