<?php


namespace App\Services;


use App\Repositories\MedicalHistoriesRepo;

class MedicalHistoriesService
{
    private $medicalHistoriesRepo;

    public function __construct()
    {
        $this->medicalHistoriesRepo = new MedicalHistoriesRepo();
    }
}
