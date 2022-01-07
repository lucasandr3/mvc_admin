<?php

namespace App\Controllers;

use App\Services\AjaxService;
use App\Services\CarrinhoAbandonadoService;
use Core\Controller;
use Support\Authenticate;

class AjaxController extends Controller
{
    private $ajaxService;
    private $carrinhoAbandonadoService;
    private $user;

    public function __construct()
    {
        $this->ajaxService = new AjaxService;
        $this->user = Authenticate::getUser()['id'];
        $this->carrinhoAbandonadoService = new CarrinhoAbandonadoService;
    }

    public function open_day()
    {
        $response = $this->ajaxService->abreCaixa($this->request());
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function busca_prods()
    {
        $response = $this->ajaxService->listaProdutos($this->request());
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function verificaDesconto($senha)
    {
        $response = $this->ajaxService->verificaSenhaDesconto($senha, $this->user);
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    public function abandonados($page)
    {
        $carrinhosAbandonados = $this->carrinhoAbandonadoService->carrinhosAbandonados();
        echo json_encode($carrinhosAbandonados);
    }
}