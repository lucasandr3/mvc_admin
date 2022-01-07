<?php
namespace App\Repositories;

use App\Interfaces\Repository\UsuarioRepositoryInterface;
use App\Models\Usuario;

class UsuarioRepository implements UsuarioRepositoryInterface
{
    public function todosAtivos()
    {
        return Usuario::where('status', ATIVO)->get();
    }

    public function todosInativos()
    {

    }

    public function clienteId()
    {

    }

    public function adicionar()
    {

    }

    public function editar()
    {

    }

    public function status()
    {

    }
}