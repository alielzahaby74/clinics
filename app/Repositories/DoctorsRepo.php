<?php


namespace App\Repositories;


use App\Models\Doctor;
use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class DoctorsRepo extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Doctor();
    }

    public function update($id,$attributes)
    {
        $model = $this->model->where('id', $id)->first();
        if (!$model) {
            return null;
        }
        if (is_null($attributes['password'])) {
            unset($attributes['password']);
        }
        $model->update($attributes);
        return $model;
    }
}
