<?php
namespace App\Repositories;

use App\Interfaces\Repository\PedidoRepositoryInterface;
use App\Models\Pedido;

class PedidoRepository implements PedidoRepositoryInterface
{
    public function todos()
    {
        return Pedido::all();
    }
}