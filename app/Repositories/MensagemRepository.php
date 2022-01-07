<?php

namespace App\Repositories;

use App\Interfaces\Repository\MensagemRepositoryInterface;
use Illuminate\Database\Capsule\Manager as DB;

class MensagemRepository implements MensagemRepositoryInterface
{
    public function mensagemAbandono(string $transaction)
    {
        return DB::table('cart_abandoned as ca')
            ->where('ca.id', $transaction)
            ->get()
            ->jsonSerialize();
    }

    public function mensagemBoleto(string $transaction)
    {
        return DB::table('venda as v')
            ->join('venda_afiliado as va', 'v.transaction', '=', 'va.transaction')
            ->join('venda_cliente as vc', 'v.transaction', '=', 'vc.transaction')
            ->join('venda_pagamento as vp', 'v.transaction', '=', 'vp.transaction')
            ->select('v.*', 'va.*', 'vc.*', 'vp.*')
            ->where('v.transaction', $transaction)
            ->get()
            ->jsonSerialize();
    }

    public function mensagemBoletoEmail(string $transaction, string $uuid)
    {
        return DB::table('venda as v')
            ->join('venda_afiliado as va', 'v.transaction', '=', 'va.transaction')
            ->join('venda_cliente as vc', 'v.transaction', '=', 'vc.transaction')
            ->join('venda_pagamento as vp', 'v.transaction', '=', 'vp.transaction')
            ->select('v.*', 'va.*', 'vc.*', 'vp.*')
            ->where('v.transaction', $transaction)
            ->where('vp.uuid_user', $uuid)
            ->get()
            ->jsonSerialize();
    }

    public function MensagemCartao(string $transaction)
    {
        return DB::table('venda as v')
            ->join('venda_afiliado as va', 'v.transaction', '=', 'va.transaction')
            ->join('venda_cliente as vc', 'v.transaction', '=', 'vc.transaction')
            ->join('venda_pagamento as vp', 'v.transaction', '=', 'vp.transaction')
            ->select('v.*', 'va.*', 'vc.*', 'vp.*')
            ->where('v.transaction', $transaction)
            ->get()
            ->jsonSerialize();
    }

    public function MensagemCartaoEmail(string $transaction)
    {
        return DB::table('venda as v')
            ->join('venda_afiliado as va', 'v.transaction', '=', 'va.transaction')
            ->join('venda_cliente as vc', 'v.transaction', '=', 'vc.transaction')
            ->join('venda_pagamento as vp', 'v.transaction', '=', 'vp.transaction')
            ->select('v.*', 'va.*', 'vc.*', 'vp.*')
            ->where('v.transaction', $transaction)
            ->get()
            ->jsonSerialize();
    }

    public function MensagemPix(string $transaction)
    {
        // TODO: Implement MensagemPix() method.
    }

    public function MensagemWallet(string $transaction)
    {
        // TODO: Implement MensagemWallet() method.
    }

}