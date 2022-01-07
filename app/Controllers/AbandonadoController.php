<?php
namespace App\Controllers;

use App\Interfaces\Service\CarrinhoAbandonadoServiceInterface;
use App\Middleware\Auth;
use Core\Controller;

class AbandonadoController extends Controller
{
    private $abandonadoService;

    public function __construct
    (
        CarrinhoAbandonadoServiceInterface $abandonadoService
    )
    {
      Auth::isLogged();
      $this->abandonadoService = $abandonadoService;
    }

	public function abandonado()
	{
        $uuid = $this->user()->uuid;

        $breadcrumb = [
            'Home' => ['link' => '', 'active' => ''],
            'Eventos' => ['link' => '', 'active' => ''],
            'Carrinhos Abandonados' => ['link' => '', 'active' => '']
        ];

        $abandonados = $this->abandonadoService->carrinhosAbandonados($uuid);

        render('abandonados/abandonados', [
            'breadcrumb' => $breadcrumb,
            'abandonados' => $abandonados
        ]);

	}
	
	public function exportDataTxt()
    {
        $uuid = $this->user()->uuid;
        $this->abandonadoService->carrinhosAbandonadosTotal($uuid);
    }

    public function exportDataCsv()
    {
        $uuid = $this->user()->uuid;
        $this->abandonadoService->carrinhosAbandonadosCsv($uuid);
    }
}