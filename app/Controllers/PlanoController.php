<?php
namespace App\Controllers;

use App\Interfaces\Service\PlanoServiceInterface;
use App\Middleware\Auth;
use App\Services\PlanoService;
use Core\Controller;

class PlanoController extends Controller
{
    private $planoService;

    public function __construct
    (
        PlanoServiceInterface $planoService
    )
    {
      Auth::isLogged();
      $this->planoService = $planoService;
    }

	public function planos()
	{
        $uuid = $this->user()->uuid;

        $breadcrumb = [
            'Eventos de carrinho' => ['link' => '', 'active' => ''],
            'Troca de Plano' => ['link' => '', 'active' => ''],
        ];

        $planos = $this->planoService->planos($uuid);

        render('planos/troca_plano', [
            'breadcrumb' => $breadcrumb,
            'planos' => $planos
        ]);

	}
}