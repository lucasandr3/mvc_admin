<?php

namespace App\Interfaces\Repository;

interface WebhookRepositoryInterface
{
    public function criaLinks(array $links);

    public function getLinksWebhook(string $uuidUser);

    public function salvaVenda(string $uuidUser);

    public function salvaCarrinhoAbandonado(string $uuidUser);

    public static function salvaTrocaPlano(string $uuidUser);

    public function salvaCancelamentoAssinatura(array $create, string $uuidUser);
}