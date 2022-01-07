<?php

namespace App\Interfaces\Repository;

interface EmailUtilsRepositoryInterface
{
    public function parametros(string $uuidUser);

    public function criarDadosEmail(array $create);

    public function editarDadosEmail(array $update, string $uuid);

    public function getCorpo(string $type, string $uuid);
}