<?php
namespace App\Services;

use App\Interfaces\Service\HomeServiceInterface;
use App\Repositories\HomeRepository;


class HomeService implements HomeServiceInterface
{
    private $repository;

    public function __construct ()
    {
        $this->repository = new HomeRepository;
    }

    public function all()
    {
//        $data = [];
//        $data['title'] = 'Pátio de Espera';
//        $data['menu'] = 'espera';
//        $data['submenu'] = 'subrec';
        $data['clientes'] = $this->repository->all();

        return $data;
    }
}