<?php

namespace App\Controllers;

use App\Middleware\Auth;
use App\Services\ClienteService;
use App\Services\ParceiroService;
use App\Services\PontoVendaService;
use App\Services\TaxaService;
use App\Services\UsuarioService;
use Core\Controller;
use Support\Authenticate;

class PontoVendaController extends Controller
{
    private $pontoVendaService;
    private $clienteService;
    private $parceiroService;
    private $usuarioService;
    private $taxaService;

    public function __construct()
    {
        Auth::isLogged();
        $this->pontoVendaService = new PontoVendaService;
        $this->clienteService = new ClienteService;
        $this->parceiroService = new ParceiroService;
        $this->usuarioService = new UsuarioService;
        $this->taxaService = new TaxaService;
    }

    public function index()
    {
        $caixaAbertoFechado = $this->pontoVendaService->isOpen();

        if($caixaAbertoFechado) {

            $clientes   = $this->clienteService->clientesAtivos();
            $parceiros  = $this->parceiroService->todosAtivos();
            $vendedores = $this->usuarioService->todosAtivos();
            $taxas = $this->taxaService->todasAtivas();

            render('pontovenda/pdv', [
                'clientes' => $clientes,
                'parceiros' => $parceiros,
                'vendedores' => $vendedores,
                'taxas' => (Object)$taxas,
                'user_id' => Authenticate::getUser()['id']
            ]);

        } else {
            render('pontovenda/abrecaixa', []);
        }
    }
}