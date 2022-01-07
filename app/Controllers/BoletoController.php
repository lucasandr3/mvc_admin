<?php
namespace App\Controllers;

use App\Interfaces\Service\BoletoServiceInterface;
use App\Middleware\Auth;
use Core\Controller;

class BoletoController extends Controller
{
    private $boletoService;

    public function __construct
    (
        BoletoServiceInterface $boletoService
    )
    {
      Auth::isLogged();
      $this->boletoService = $boletoService;
    }

	public function boletosGerados()
	{
        $uuid = $this->user()->uuid;

        $breadcrumb = [
            'Vendas' => ['link' => '', 'active' => ''],
            'Boletos' => ['link' => '', 'active' => ''],
            'Boletos Gerados' => ['link' => '', 'active' => '']
        ];

        $boletosGerados = $this->boletoService->boletosGerados($uuid);

        render('boletos/boletos_gerados', [
            'breadcrumb' => $breadcrumb,
            'boletosGerados' => $boletosGerados,
        ]);

	}

    public function boletosAprovados()
    {
        $uuid = $this->user()->uuid;

        $breadcrumb = [
            'Vendas' => ['link' => '', 'active' => ''],
            'Boletos' => ['link' => '', 'active' => ''],
            'Boletos Aprovados' => ['link' => '', 'active' => '']
        ];

        $boletosAprovados = $this->boletoService->boletosAprovados($uuid);

        render('boletos/boletos_aprovados', [
            'breadcrumb' => $breadcrumb,
            'boletosAprovados' => $boletosAprovados,
        ]);

    }
}