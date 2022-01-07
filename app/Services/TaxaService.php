<?php

namespace App\Services;

use App\Interfaces\Service\TaxaServiceInterface;
use App\Repositories\TaxaRepository;

class TaxaService implements TaxaServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new TaxaRepository;
    }

    public function todasAtivas()
    {
        $taxas = $this->repository->todasAtivas();
        $codTaxas = array_column($taxas, 'id_tax');

        $bandeiras = $this->repository->buscaBandeirasTaxas($codTaxas);

        $bandeirasAgrupadas = arrayGroupBy('id_tax', $bandeiras);

        foreach ($taxas as $key => $value) {
            foreach ($bandeirasAgrupadas as $k => $v) {
                if($v[0]['id_tax'] === $value['id_tax']) {
                    $taxas[$key]['bandeiras'] = $v;
                }
            }
        }

        return $taxas;
    }

    public function taxaId()
    {

    }

    public function adicionar()
    {

    }

    public function editar()
    {

    }

    public function apagar()
    {

    }
}