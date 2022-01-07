<?php

namespace App\Interfaces\Service;

interface WebhookServiceInterface
{
    public function criaLinks(string $uuid);

    public function getLinksWebhook(string $uuidUser);

    public function salvaVendas(string $uuidUser);

    public function salvaCarrinhoAbandonado(string $uuidUser);

    public function salvaTrocaPlano(string $uuidUser);

    public function salvaCancelamentoAssinatura(object $data, string $uuidUser);
}