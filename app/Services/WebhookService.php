<?php

namespace App\Services;

use App\Interfaces\Service\WebhookServiceInterface;
use App\Repositories\WebhookRepository;
use Support\Authenticate;

class WebhookService implements WebhookServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new WebhookRepository;
    }

    public function criaLinks($uuid)
    {
        $links = criaLinksWebHook($uuid);
        $this->repository->criaLinks($links);
    }

    public function getLinksWebhook(string $uuidUser)
    {
        return $this->repository->getLinksWebhook($uuidUser);
    }

    public function salvaVendas(string $uuidUser)
    {
        $this->repository->salvaVenda($uuidUser);
    }

    public function salvaCarrinhoAbandonado(string $uuidUser)
    {
        $this->repository->salvaCarrinhoAbandonado($uuidUser);
    }

    public function salvaTrocaPlano(string $uuidUser)
    {
        $this->repository->salvaTrocaPlano($uuidUser);
    }

    public function salvaCancelamentoAssinatura(object $data, string $uuidUser)
    {
        $create = [
            'uuid_user' => $uuidUser,
            'produto' => $data->product->name,
            'valor_atual_assinatura' => $data->product->actual_recurrence_value,
            'lead' => $data->subscriber->name,
            'email_lead' => $data->subscriber->email,
            'nome_plano' => $data->plan->name,
            'data_cancelamento' => $data->plan->cancellation_date
        ];

        $this->repository->salvaCancelamentoAssinatura($create, $uuidUser);
    }
}