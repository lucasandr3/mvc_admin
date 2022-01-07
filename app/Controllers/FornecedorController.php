<?php

namespace App\Controllers;

use App\Services\FornecedorService;
use Core\Controller;

class FornecedorController extends Controller
{
    private $fornecedorService;

    public function __construct()
    {
        $this->fornecedorService = new FornecedorService;
    }

    public function index()
    {

    }
}