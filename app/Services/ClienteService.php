<?php
namespace App\Services;

use App\Interfaces\Service\ClienteServiceInterface;
use App\Repositories\ClienteRepository;
use Support\Paginacao;
use Utils\Utils;


class ClienteService implements ClienteServiceInterface
{
    private $repository;

    public function __construct ()
    {
        $this->repository = new ClienteRepository;
    }

    public function clientesAtivos(string $uuid)
    {
        $offset = Paginacao::getOffset();

        $leads = $this->repository->ativos($offset, QUANTIDADE_REGISTROS, $uuid);

        $leads = array_map(function($lead) {
            $lead->documento = Utils::formatCnpjCpf($lead->documento);
            $lead->telefone = Utils::formataTelefone($lead->ddd.$lead->telefone);
            $lead->nome = ucfirst($lead->nome);
            $lead->primeiroNome = ucfirst($lead->primeiroNome);
            $lead->ultimoNome = ucfirst($lead->ultimoNome);
            return $lead;
        }, $leads);

        $qtdRegistros = $this->repository->ativosQtde($uuid);

        $paginacao = Paginacao::montaPaginacao('leads', $qtdRegistros);

        return ['leads' => $leads, 'paginacao' => $paginacao];
    }
}