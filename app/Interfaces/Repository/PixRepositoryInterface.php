<?php

namespace App\Interfaces\Repository;

interface PixRepositoryInterface
{
    public function pixAguardando(int $offset, int $limite, string $uuid);

    public function pixAguardandoQtde(string $uuid);

    public function pixAprovados(int $offset, int $limite, string $uuid);

    public function pixAprovadosQtde(string $uuid);
}