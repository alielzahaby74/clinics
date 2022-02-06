<?php


namespace App\Repositories;


use App\Models\Common\City;
use App\Repositories\Base\BaseRepository;

class CitiesRepo extends BaseRepository
{
    public function __construct()
    {
        $this->model = new City();
    }
}
