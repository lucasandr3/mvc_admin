<?php

namespace App\Controllers;

use App\Interfaces\Service\LoginServiceInterface;
use Core\Controller;

class LoginController extends Controller
{
    private $service;

    public function __construct
    (
        LoginServiceInterface $service
    )
    {
        $this->service = $service;
    }

    public function index()
    {
        if (isset($_SESSION['userLogged'])) {
            $this->redirect('');
        }

        $data = [];
        $this->view('login/login', $data);
    }

    public function signin()
    {
        $this->service->signin($this->request());
    }

    public function cadastro()
    {
        $this->view('cadastro/cadastro', []);
    }

    public function signup()
    {
        $dados = $this->request();
        $this->service->register($dados->request);
    }

    public function logout()
    {
        $this->service->logout();
    }
}