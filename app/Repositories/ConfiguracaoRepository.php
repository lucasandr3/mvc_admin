<?php
namespace App\Repositories;

use App\Interfaces\Repository\ConfiguracaoRepositoryInterface;
use App\Models\Configuracao;

class ConfiguracaoRepository implements ConfiguracaoRepositoryInterface
{
    public function todos()
    {
        return Configuracao::all();
    }
}