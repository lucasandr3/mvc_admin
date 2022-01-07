<?php
namespace App\Repositories;

use App\Interfaces\Repository\HomeRepositoryInterface;
use App\Models\Home;

class HomeRepository implements HomeRepositoryInterface
{
    public function all()
    {
        return Home::all();
    }
}