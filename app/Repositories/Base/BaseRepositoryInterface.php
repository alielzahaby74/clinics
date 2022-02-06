<?php

namespace App\Repositories\Base;

interface BaseRepositoryInterface
{
    public function create(array $attributes);
    public function find(int $id);
    public function update(int $id, array $attributes);
    public function all();
}
