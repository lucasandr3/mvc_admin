<?php
namespace App\Repositories;

use App\Interfaces\Repository\ContaRepositoryInterface;
use Illuminate\Database\Capsule\Manager as DB;
use App\Models\Conta;
use App\Models\Webhook;
use Support\Authenticate;

class ContaRepository implements ContaRepositoryInterface
{
    public function meusDados($uuidUser)
    {
        return Conta::where('uuid_user', $uuidUser)->get()->jsonSerialize()[0];
    }

    public function editarDados(array $update, int $codUser)
    {
        $user = Conta::find($codUser);
        $user->update($update);
        Authenticate::setUser($user);
        Authenticate::redirectHome('conta');
    }

    public function editarSenha(array $update, int $codUser)
    {
        $user = Conta::find($codUser);
        $user->update($update);
        Authenticate::logout();
        Authenticate::redirectHome('login');
    }

    public function getLinksWebhook(string $uuidUser)
    {
        return Webhook::where('uuid_user', $uuidUser)->get();
    }
}