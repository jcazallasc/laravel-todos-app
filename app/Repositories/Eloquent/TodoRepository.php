<?php

namespace App\Repositories\Eloquent;

use App\Todo;
use App\Repositories\TodoRepositoryInterface;
use Illuminate\Support\Collection;

class TodoRepository extends BaseRepository implements TodoRepositoryInterface
{

    public function __call($method, $args)
    {
        return call_user_func_array([$this->model, $method], $args);
    }

    /**
     * UserRepository constructor.
     *
     * @param Todo $model
     */
    public function __construct(Todo $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
}
