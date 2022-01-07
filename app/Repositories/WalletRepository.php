<?php

namespace App\Repositories;

use App\Interfaces\Repository\WalletRepositoryInterface;
use App\Models\Wallet;
use Illuminate\Database\Capsule\Manager as DB;

class WalletRepository implements WalletRepositoryInterface
{
    public function wallet(int $offset, int $limit, string $uuid)
    {
        return DB::table('venda as v')
            ->join('venda_pagamento as vp', 'v.transaction', '=', 'vp.transaction')
            ->select('v.*', 'vp.*')
            ->offset($offset)
            ->limit($limit)
            ->where('vp.payment_type', 'Wallet')
            ->where('v.uuid_user', $uuid)
            ->get()
            ->jsonSerialize();
    }

    public function walletQtde(string $uuid)
    {
        return DB::table('venda as v')
            ->join('venda_pagamento as vp', 'v.transaction', '=', 'vp.transaction')
            ->select('v.*', 'vp.*')
            ->where('vp.payment_type', 'Wallet')
            ->where('v.uuid_user', $uuid)
            ->get()
            ->count();
    }
}