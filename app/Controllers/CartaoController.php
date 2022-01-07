<?php
namespace App\Controllers;

use App\Interfaces\Service\CartaoServiceInterface;
use App\Middleware\Auth;
use Core\Controller;

class CartaoController extends Controller
{
    private $cartaoService;

    public function __construct
    (
        CartaoServiceInterface $cartaoService
    )
    {
      Auth::isLogged();
      $this->cartaoService = $cartaoService;
    }

	public function cartao()
	{
        $uuid = $this->user()->uuid;

        $breadcrumb = [
            'Vendas' => ['link' => '', 'active' => ''],
            'Cartão' => ['link' => '', 'active' => ''],
        ];

        $cartoes = $this->cartaoService->cartoes($uuid);

        render('cartao/cartao', [
            'breadcrumb' => $breadcrumb,
            'cartoes' => $cartoes
        ]);

	}
}