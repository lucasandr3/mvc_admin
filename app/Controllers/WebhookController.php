<?php
namespace App\Controllers;

use App\Middleware\Auth;
use App\Services\WebhookService;
use Core\Controller;

class WebhookController extends Controller
{
    private $webhookService;

    public function __construct ()
    {
      $this->webhookService = new WebhookService;
    }

	public function vendas($uuid)
	{
        $data = file_get_contents('php://input');
        echo "<pre>";
        print_r($data);
        die;
        $this->webhookService->salvaVendas($uuid);
	}
    
    public function carrinhoAbandonado($uuid)
    {
        $this->webhookService->salvaCarrinhoAbandonado($uuid);
    }
    
    public function trocaPlano($uuid)
    {
        $this->webhookService->salvaTrocaPlano($uuid);
    }

    public function cancelamentoAssinatura($uuid)
    {
        $data = (object)[
        'id' => '0d7aa966-b887-4617-8c56-9e865bfc8ce4',
        'creation_date' => '1632411406874',
        'event' => 'SUBSCRIPTION_CANCELLATION',
        'version' => '2.0.0',
        'data' => (object)[
            'date_next_charge' => '1580667200000'
        ], 
        'product' => (object)[
            'name' => 'Product Name',
            'id' => '3526906',
            'actual_recurrence_value' => 50.1
        ], 
        'subscriber' => (object) [
            'code' => 'QO4THU04',
            'name' => 'Subscriber Name',
            'email' => 'subscriber@email.com'
        ],
        'subscription' => (object) [
            'id' => '471681'
        ],
        'plan' => (object) [
        'name' => 'Plan Name',
        'id' => '460805',
        'cancellation_date' => '1633410850832'
        ]
    ];

        $this->webhookService->salvaCancelamentoAssinatura($data, $uuid);
    }
}