<?php

namespace App\Services;

use App\Interfaces\Service\CarrinhoAbandonadoServiceInterface;
use App\Repositories\CarrinhoAbandonadoRepository;
use Support\Paginacao;

class CarrinhoAbandonadoService implements CarrinhoAbandonadoServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new CarrinhoAbandonadoRepository;
    }

    public function carrinhosAbandonados($uuid)
    {
        $offset = Paginacao::getOffset('carrinho');

        $abandonados = $this->repository->carrinhosAbandonados($offset, QUANTIDADE_REGISTROS, $uuid);
        $qtdRegistros = $this->repository->carrinhosAbandonadosQtde($uuid);

        $abandonadosFormatado = [];

        foreach ($abandonados as $key => $abandonado) {
            $abandonadosFormatado[$key]['id'] = $abandonado->id;
            $abandonadosFormatado[$key]['product'] = json_decode($abandonado->cart)->productName;
            $abandonadosFormatado[$key]['leadName'] = json_decode($abandonado->cart)->buyerVO->name;
            $abandonadosFormatado[$key]['leadEmail'] = json_decode($abandonado->cart)->buyerVO->email;
            $abandonadosFormatado[$key]['leadPhone'] = isset(json_decode($abandonado->cart)->buyerVO->phone)
                ? json_decode($abandonado->cart)->buyerVO->phone
                : 'Não Informado';
        }

        $paginacao = Paginacao::montaPaginacao('vendas/carrinhos_abandonados', $qtdRegistros);
        
        return ['abandonado' => $abandonadosFormatado, 'paginacao' => $paginacao];

    }
    
    public function carrinhosAbandonadosTotal($uuid)
    {
        $data = $this->repository->carrinhosAbandonadosTotal($uuid);
        $emails = [];

        $arquivo = "leads.txt";
        $arq = fopen($arquivo,"w");
        $cabecalho = "E-mails Leads extraidos\n";

        foreach ($data as $key => $d) {
            $emails[] = json_decode($d['cart'])->buyerVO->email;
        }

        $emails = array_unique($emails);

        foreach ($emails as $value) {
            fwrite($arq, $value."\n");
        }

        fclose($arq);

        header('Content-type: octet/stream');
        header('Content-disposition: attachment; filename="'.$arquivo.'";');
        readfile($arquivo);
    }
    
    public function carrinhosAbandonadosCsv($uuid)
    {
        $data = $this->repository->carrinhosAbandonadosTotal($uuid);
        $emails = [];

        $arquivo = "leads.csv";

        foreach ($data as $key => $d) {
            $emails[] = json_decode($d['cart'])->buyerVO->email;
        }

        $emails = array_unique($emails);
        $emailsFiltrados = [];

        foreach ($emails as $key => $email) {
            $emailsFiltrados[$key][] = $email;
        }

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename='.$arquivo);
        $fp = fopen('php://output', 'w');

        foreach ($emailsFiltrados as $linha) {
            fputcsv($fp, $linha);
        }

        fclose($fp);
    }
}