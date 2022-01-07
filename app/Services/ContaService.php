<?php

namespace App\Services;

use App\Interfaces\Service\ContaServiceInterface;
use App\Repositories\ContaRepository;
use Support\Authenticate;
use Support\Validacao;

class ContaService implements ContaServiceInterface
{
    private $repository;
    private $validacao;

    public function __construct()
    {
        $this->repository = new ContaRepository;
        $this->validacao = new Validacao;
    }

    public function meusDados($uuidUser)
    {
        return $this->repository->meusDados($uuidUser);
    }

    public function editarDados($dados, $user)
    {
        $update = [
            'user_name' => $this->validacao->validaString($dados->nome),
            'user_email' => $this->validacao->validaEmail($dados->email)
        ];

        $this->repository->editarDados($update, $user['id']);
    }

    public function editarSenha($dados, $user)
    {
        $update = [
            'user_pass' => password_hash($this->validacao->validaString($dados->user_pass), PASSWORD_DEFAULT)
        ];

        $this->repository->editarSenha($update, $user['id']);
    }

    public function getLinksWebhook(string $uuidUser)
    {
        return $this->repository->getLinksWebhook($uuidUser);
    }
}