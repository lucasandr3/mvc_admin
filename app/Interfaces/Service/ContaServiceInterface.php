<?php

namespace App\Interfaces\Service;

interface ContaServiceInterface
{
    public function meusDados(string $uuidUser);

    public function editarDados(object $dados, array $user);

    public function editarSenha(object $dados, array $user);

    public function getLinksWebhook(string $uuidUser);
}