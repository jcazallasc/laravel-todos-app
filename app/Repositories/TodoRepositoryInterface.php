<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface TodoRepositoryInterface
{
    public function all(): Collection;
}
