<?php

namespace Support;


class Paginacao
{
    public static function getOffset()
    {
        $limite = QUANTIDADE_REGISTROS;
        $pagina = intval(filter_input(INPUT_GET, 'pagina'));

        if ($pagina <= 1) {
            return 0;
        }

        return ($pagina - 1) * $limite;
    }

    public static function montaPaginacao($param, $qtdRegistros)
    {
        $result = array();

        $paginaAtual = intval(filter_input(INPUT_GET, 'pagina'));

        if($paginaAtual === 0) {
            $paginaAtual = 1;
        }

        $limitePaginacao = QUANTIDADE_REGISTROS;

        $primeira = 1;
        $anterior = $paginaAtual - 1;
        $proxima = $paginaAtual + 1;
        $ultima = ceil($qtdRegistros / $limitePaginacao);
        $result['qtdTotal'] = $qtdRegistros;
        $result['atual'] = $paginaAtual;
        $result['proxima'] = ($proxima > $ultima) ? $ultima : $proxima;
        $result['anterior'] = ($anterior < $primeira) ? $primeira : $anterior;
        $result['primeira'] = $primeira;
        $result['ultima'] = $ultima;
        $result['url'] = $_SERVER['APP_URL'].$param;

        $primeiraPagPaginacao = ($paginaAtual - QTD_PAGINAS_EXIBIR) < $primeira ? $primeira : ($paginaAtual - QTD_PAGINAS_EXIBIR);
        $ultimaPagPaginacao = ($paginaAtual + QTD_PAGINAS_EXIBIR) > $ultima ? $ultima : ($paginaAtual + QTD_PAGINAS_EXIBIR);
        
        if($ultima == 0) {
            $result['paginas'] = ['0' => 1];
        } else {
            for ($i = $primeiraPagPaginacao; $i <= $ultimaPagPaginacao; $i++) {
                $result['paginas'][] = $i;
            }
        }

        return $result;
    }
}
