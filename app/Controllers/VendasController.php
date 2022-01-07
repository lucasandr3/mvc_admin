<?php

namespace App\Controllers;

use App\Interfaces\Service\ClienteServiceInterface;
use App\Interfaces\Service\ParceiroServiceInterface;
use App\Interfaces\Service\TaxaServiceInterface;
use App\Interfaces\Service\UsuarioServiceInterface;
use App\Interfaces\Service\VendaServiceInterface;
use App\Middleware\Auth;
use Core\Controller;

class VendasController extends Controller
{
    private $vendaService;
    private $clienteService;
    private $parceiroService;
    private $usuarioService;
    private $taxaService;

    public function __construct
    (
        VendaServiceInterface $vendaService,
        ClienteServiceInterface $clienteService,
        ParceiroServiceInterface $parceiroService,
        UsuarioServiceInterface $usuarioService,
        TaxaServiceInterface $taxaService
    )
    {
        Auth::isLogged();
        $this->vendaService = $vendaService;
        $this->clienteService = $clienteService;
        $this->parceiroService = $parceiroService;
        $this->usuarioService = $usuarioService;
        $this->taxaService = $taxaService;
    }

    public function index()
    {

        $data = [];

        $data['nome'] = 'Lucas';

        $vendas = $this->vendaService->buscaTodasVendas();

        render('vendas/vendas', [
            'vendas' => $vendas
        ]);

    }

    public function nova()
    {
        $vendaCompleta = $this->vendaService->salvaVenda($this->request());

        $clientes = $this->clienteService->clientesAtivos();
        $parceiros = $this->parceiroService->todosAtivos();
        $vendedores = $this->usuarioService->todosAtivos();
        $taxas = $this->taxaService->todasAtivas();

        if ($vendaCompleta) {

            $this->redirect('pdv', [
                    'type' => 'success',
                    'title' => 'Aviso',
                    'text' => 'Login e/ou senha errados.'
                ]
            );
        } else {

            $this->redirect('pdv', [
                    'type' => 'error',
                    'title' => 'Aviso',
                    'text' => 'Login e/ou senha errados.'
                ]
            );
        }
    }

    public function excluir($venda)
    {
        $del = $this->vendaService->excluirVenda($venda);

        if($del) {
            $this->redirect('vendas', [
                    'type' => 'success',
                    'title' => 'Aviso',
                    'text' => 'Login e/ou senha errados.'
                ]
            );
        }
    }
}