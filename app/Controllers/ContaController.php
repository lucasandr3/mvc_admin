<?php

namespace App\Controllers;

use App\Interfaces\Service\ContaServiceInterface;
use App\Interfaces\Service\EmailUtilsServiceInterface;
use App\Middleware\Auth;
use App\Services\ContaService;
use App\Services\EmailUtilsService;
use Core\Controller;
use Support\Authenticate;

class ContaController extends Controller
{
    private $contaService;
    private $emailUtilsService;

    public function __construct
    (
        ContaServiceInterface $contaService,
        EmailUtilsServiceInterface $emailUtilsService
    )
    {
        Auth::isLogged();
        $this->contaService = $contaService;
        $this->emailUtilsService = $emailUtilsService;
    }

    public function dados()
    {
        $uuidUser = $this->user()->uuid;

        $breadcrumb = [
            'Minha Conta' => ['link' => '', 'active' => ''],
        ];

        $dadosEmail = $this->emailUtilsService->getParametros($uuidUser);
        $meusDados = $this->contaService->meusDados($uuidUser);
        $linksWebhook = $this->contaService->getLinksWebhook($uuidUser);

        $this->render('conta/minha_conta', [
            'breadcrumb' => $breadcrumb,
            'email' => (count($dadosEmail) > 0) ? $dadosEmail[0] : [],
            'dados' => $meusDados,
            'linksWebhook' => $linksWebhook
        ]);
    }

    public function editarDados()
    {
        $dados = $this->request();
        $user = Authenticate::getUser();
        $this->contaService->editarDados($dados, $user);
    }

    public function editarDadosEmail()
    {
        $dados = $this->request();
        $this->emailUtilsService->editarDadosEmail($dados);
    }

    public function editarSenha()
    {
        $dados = $this->request();
        $user = Authenticate::getUser();
        $this->contaService->editarSenha($dados, $user);
    }
}