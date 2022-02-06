<?php


namespace App\Services;


use App\Repositories\CitiesRepo;
use App\Repositories\CountriesRepo;

class CommonsService
{
    private $countriesRepo;
    private $citiesRepo;

    public function __construct()
    {
        $this->countriesRepo = new CountriesRepo();
        $this->citiesRepo = new CitiesRepo();
    }

    public function getCountries()
    {
        return $this->countriesRepo->all();
    }

    public function getCities($id)
    {
        return $this->citiesRepo->model->where('country_id', $id)->get();
    }
}
