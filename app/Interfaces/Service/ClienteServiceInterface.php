<?php
namespace App\Interfaces\Service;


interface ClienteServiceInterface
{
    public function clientesAtivos(string $uuid);
}