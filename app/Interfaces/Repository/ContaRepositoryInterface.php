<?php

namespace App\Interfaces\Repository;

interface ContaRepositoryInterface
{
    public function meusDados(int $codUser);

    public function editarDados(array $update, int $codUser);

    public function editarSenha(array $update, int $codUser);

    public function getLinksWebhook(string $uuidUser);
}