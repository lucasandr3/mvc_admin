<?php

namespace App\Interfaces\Repository;

interface PlanoRepositoryInterface
{
    public function getPlanos(int $offset, int $limite, string $uuid);

    public function planosQtde(string $uuid);
}