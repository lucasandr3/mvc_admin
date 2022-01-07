<?php

namespace App\Repositories;

use App\Interfaces\Repository\PixRepositoryInterface;
use App\Models\Pix;
use Illuminate\Database\Capsule\Manager as DB;

class PixRepository implements PixRepositoryInterface
{
    public function pixAguardando(int $offset, int $limit, $uuid)
    {
        return DB::table('venda as v')
            ->join('venda_pagamento as vp', 'v.transaction', '=', 'vp.transaction')
            ->select('v.*', 'vp.*')
            ->offset($offset)
            ->limit($limit)
            ->where('vp.payment_type', 'PIX')
            ->where('v.status', 'waiting_payment')
            ->where('v.uuid_user', $uuid)
            ->get()
            ->jsonSerialize();
    }

    public function pixAguardandoQtde($uuid)
    {
        return DB::table('venda as v')
            ->join('venda_pagamento as vp', 'v.transaction', '=', 'vp.transaction')
            ->select('v.*', 'vp.*')
            ->where('vp.payment_type', 'PIX')
            ->where('v.status', 'waiting_payment')
            ->where('v.uuid_user', $uuid)
            ->get()
            ->count();
    }

    public function pixAprovados(int $offset, int $limit, $uuid)
    {
        return DB::table('venda as v')
            ->join('venda_afiliado as va', 'v.transaction', '=', 'va.transaction')
            ->join('venda_cliente as vc', 'v.transaction', '=', 'vc.transaction')
            ->join('venda_pagamento as vp', 'v.transaction', '=', 'vp.transaction')
            ->select('v.*', 'va.*', 'vc.*', 'vp.*')
            ->offset($offset)
            ->limit($limit)
            ->where('vp.payment_type', 'PIX')
            ->where('v.uuid_user', $uuid)
            ->get()
            ->jsonSerialize();
    }

    public function pixAprovadosQtde($uuid)
    {
        return DB::table('venda as v')
            ->join('venda_afiliado as va', 'v.transaction', '=', 'va.transaction')
            ->join('venda_cliente as vc', 'v.transaction', '=', 'vc.transaction')
            ->join('venda_pagamento as vp', 'v.transaction', '=', 'vp.transaction')
            ->select('v.*', 'va.*', 'vc.*', 'vp.*')
            ->where('vp.payment_type', 'PIX')
            ->where('v.uuid_user', $uuid)
            ->get()
            ->count();
    }
}