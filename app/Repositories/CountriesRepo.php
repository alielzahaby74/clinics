<?php


namespace App\Repositories;


use App\Models\Common\Country;
use App\Repositories\Base\BaseRepository;

class CountriesRepo extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Country();
    }
}
