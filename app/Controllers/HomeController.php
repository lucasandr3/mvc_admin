<?php

namespace App\Controllers;

use App\Middleware\Auth;
use Core\Controller;

class HomeController extends Controller
{
    public function __construct ()
    {
        Auth::isLogged();
    }

    public function index()
    {
        $uuid = $this->user()->uuid;

        $breadcrumb = [
            'Painel' => ['link' => '', 'active' => true],
        ];

        $this->render('home/home', [
            'breadcrumb' => $breadcrumb,
        ]);

	}
}