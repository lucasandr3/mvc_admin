<?php
namespace App\Controllers;

use App\Interfaces\Service\ClienteServiceInterface;
use App\Middleware\Auth;
use Core\Controller;

class ClienteController extends Controller
{
    private $clienteService;

    public function __construct
    (
        ClienteServiceInterface $clienteService
    )
    {
      Auth::isLogged();
      $this->clienteService = $clienteService;
    }

	public function ativos()
	{
        $uuid = $this->user()->uuid;

        $breadcrumb = [
            'Leads' => ['link' => '', 'active' => ''],
        ];

        $clientes = $this->clienteService->clientesAtivos($uuid);

        render('clientes/ativos', [
            'breadcrumb' => $breadcrumb,
            'leads' => $clientes
        ]);
	}

    public function novo()
    {
        //$clientes = $this->clienteService->clientesAtivos();

        render('clientes/novo', [
            //'clientes' => $clientes
        ]);
    }
}