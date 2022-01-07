<?php
namespace App\Controllers;

use App\Interfaces\Service\CancelamentoServiceInterface;
use App\Middleware\Auth;
use Core\Controller;

class CancelamentoController extends Controller
{
    private $cancelamentoService;

    public function __construct
    (
        CancelamentoServiceInterface $cancelamentoService
    )
    {
      Auth::isLogged();
      $this->cancelamentoService = $cancelamentoService;
    }

	public function assinatura()
	{
        $uuid = $this->user()->uuid;

        $breadcrumb = [
            'Home' => ['link' => '', 'active' => ''],
            'Eventos' => ['link' => '', 'active' => ''],
            'Cancelamento de Assinatura' => ['link' => '', 'active' => '']
        ];

        $cancelamentos = $this->cancelamentoService->cancelamentos($uuid);

        render('cancelamento/cancelamento', [
            'breadcrumb' => $breadcrumb,
            'cancelamentos' => $cancelamentos
        ]);

	}
}