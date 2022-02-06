<?php


namespace App\Repositories;


use App\Models\MedicalHistory;
use App\Repositories\Base\BaseRepository;

class MedicalHistoriesRepo extends BaseRepository
{
    public function __construct()
    {
        $this->model = new MedicalHistory();
    }
}
