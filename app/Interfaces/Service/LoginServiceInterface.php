<?php
namespace App\Interfaces\Service;


interface LoginServiceInterface
{
    public function all();

    public function signin(Object $request);

    public function register(Object $request);

    public function logout();
}