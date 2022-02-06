<?php


namespace App\Repositories;


use App\Models\Shift;
use App\Repositories\Base\BaseRepository;

class ShiftsRepo extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Shift();
    }
}
