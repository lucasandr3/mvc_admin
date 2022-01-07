<?php

namespace App\Interfaces\Service;

interface PixServiceInterface
{
    public function pixAguardando(string $uuid);

    public function pixAprovados(string $uuid);
}
