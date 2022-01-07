<?php

namespace App\Repositories;

use App\Interfaces\Repository\PlanoRepositoryInterface;
use App\Models\Plano;
use Illuminate\Database\Capsule\Manager as DB;

class PlanoRepository implements PlanoRepositoryInterface
{
    public function getPlanos(int $offset, int $limit, string $uuid)
    {
        return DB::table('choose_plan')
            ->offset($offset)
            ->limit($limit)
            ->where('uuid_user', $uuid)
            ->get()
            ->jsonSerialize();
    }

    public function planosQtde(string $uuid)
    {
        return DB::table('choose_plan')
            ->where('uuid_user', $uuid)
            ->get()
            ->count();
    }
}