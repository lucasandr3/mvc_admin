<?php

namespace App\Repositories;

use App\Interfaces\Repository\BoletoRepositoryInterface;
use App\Models\Boleto;
use Illuminate\Database\Capsule\Manager as DB;


class BoletosRepository implements BoletoRepositoryInterface
{
    public function boletosGerados(int $offset, int $limit, string $uuid)
    {
        return DB::table('venda as v')
            ->join('venda_afiliado as va', 'v.transaction', '=', 'va.transaction')
            ->join('venda_cliente as vc', 'v.transaction', '=', 'vc.transaction')
            ->join('venda_pagamento as vp', 'v.transaction', '=', 'vp.transaction')
            ->select('v.*', 'va.*', 'vc.*', 'vp.*')
            ->offset($offset)
            ->limit($limit)
            ->where('v.status', 'billet_printed')
            ->where('v.uuid_user', $uuid)
            ->get()
            ->jsonSerialize();
    }

    public function boletosQtdeGerados(string $uuid)
    {
        return DB::table('venda as v')
            ->join('venda_afiliado as va', 'v.transaction', '=', 'va.transaction')
            ->join('venda_cliente as vc', 'v.transaction', '=', 'vc.transaction')
            ->join('venda_pagamento as vp', 'v.transaction', '=', 'vp.transaction')
            ->select('v.*', 'va.*', 'vc.*', 'vp.*')
            ->where('v.status', 'billet_printed')
            ->where('vp.payment_type', 'billet')
            ->where('v.uuid_user', $uuid)
            ->get()
            ->count();
    }

    public function boletosAprovados(int $offset, int $limit, string $uuid)
    {
        return DB::table('venda as v')
            ->join('venda_afiliado as va', 'v.transaction', '=', 'va.transaction')
            ->join('venda_cliente as vc', 'v.transaction', '=', 'vc.transaction')
            ->join('venda_pagamento as vp', 'v.transaction', '=', 'vp.transaction')
            ->select('v.*', 'va.*', 'vc.*', 'vp.*')
            ->offset($offset)
            ->limit($limit)
            ->where('v.status', 'approved')
            ->where('vp.payment_type', 'billet')
            ->where('v.uuid_user', $uuid)
            ->get()
            ->jsonSerialize();
    }

    public function boletosQtdeAprovados(string $uuid)
    {
        return DB::table('venda as v')
            ->join('venda_afiliado as va', 'v.transaction', '=', 'va.transaction')
            ->join('venda_cliente as vc', 'v.transaction', '=', 'vc.transaction')
            ->join('venda_pagamento as vp', 'v.transaction', '=', 'vp.transaction')
            ->select('v.*', 'va.*', 'vc.*', 'vp.*')
            ->where('v.status', 'approved')
            ->where('vp.payment_type', 'billet')
            ->where('v.uuid_user', $uuid)
            ->get()
            ->count();
    }
}