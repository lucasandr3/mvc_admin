<?php

namespace App\Repositories;

use App\Interfaces\Repository\CancelamentoRepositoryInterface;
use App\Models\CancelamentoAssinatura;
use Illuminate\Database\Capsule\Manager as DB;

class CancelamentoRepository implements CancelamentoRepositoryInterface
{
    public function getCancelamentos(int $offset, int $limit, string $uuid)
    {
        return DB::table('cancelamento_assinatura as c')
            ->offset($offset)
            ->limit($limit)
            ->where('c.uuid_user', $uuid)
            ->get()
            ->jsonSerialize();
    }

    public function getCancelamentosQtde(string $uuid)
    {
        return DB::table('cancelamento_assinatura as c')
            ->where('c.uuid_user', $uuid)
            ->get()
            ->count();
    }
}