<?php

namespace App\Repositories\Base;

use App\Repositories\Base\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create($attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes)
    {
        $model = $this->model->where('id', $id)->get()->first();
        if (!$model) {
            return null;
        }
        $model->update($attributes);
        return $model;
    }

    public function find($id)
    {
        $model = $this->model->where('id', $id)->get()->first();
        if (!$model) {
            return null;
        }
        return $model;
    }

    public function filter($filter_by, $filter_value, $limit = 10)
    {
        return $this->model->where($filter_by, 'LIKE' , '%' . $filter_value . '%')->paginate($limit);
    }

    public function all()
    {
        return $this->model->all();
    }

    public  function pagination($num = 10)
    {
        return $this->model->paginate($num);
    }
    public  function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
