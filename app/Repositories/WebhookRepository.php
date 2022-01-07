<?php
namespace App\Repositories;

use App\Interfaces\Repository\WebhookRepositoryInterface;
use App\Models\CancelaAssinatura;
use Illuminate\Database\Capsule\Manager as DB;
use App\Models\Webhook;

class WebhookRepository implements WebhookRepositoryInterface
{
    public function criaLinks($links)
    {
//        return DB::table('link-webhook')->insert('');
        return Webhook::insert($links);
    }

    public function getLinksWebhook(string $uuidUser)
    {
        return Webhook::where('uuid_user', $uuidUser)->get();
    }

    public function salvaVenda(string $uuidUser)
    {
        // TODO: Implement salvaVenda() method.
    }

    public function salvaCarrinhoAbandonado(string $uuidUser)
    {
        // TODO: Implement salvaCarrinhoAbandonado() method.
    }

    public static function salvaTrocaPlano(string $uuidUser)
    {
        // TODO: Implement salvaTrocaPlano() method.
    }

    public function salvaCancelamentoAssinatura(array $create, string $uuidUser)
    {
        CancelaAssinatura::insert($create);
    }
}