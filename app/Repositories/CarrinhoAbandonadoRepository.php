<?php

namespace App\Repositories;

use App\Interfaces\Repository\CarrinhoAbandonadoRepositoryInterface;
use App\Models\CarrinhoAbandonado;
use Illuminate\Database\Capsule\Manager as DB;


class CarrinhoAbandonadoRepository implements CarrinhoAbandonadoRepositoryInterface
{
    public function carrinhosAbandonados(int $offset, int $limit, string $uuid)
    {
        return DB::table('cart_abandoned')
            ->offset($offset)
            ->limit($limit)
            ->where('uuid_user', $uuid)
            ->get()->jsonSerialize();
    }

    public function carrinhosAbandonadosQtde(string $uuid)
    {
        return CarrinhoAbandonado::all()->where('uuid_user', $uuid)->count();
    }
    
    public function carrinhosAbandonadosTotal(string $uuid)
    {
        return CarrinhoAbandonado::all()->where('uuid_user', $uuid)->jsonSerialize();
    }
}