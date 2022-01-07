<?php

namespace App\Interfaces\Service;

interface BoletoServiceInterface
{
    public function boletosGerados(string $uuid);

    public function boletosAprovados(string $uuid);
}
