<?php


namespace App\Interfaces\Repository;


interface LoginRepositoryInterface
{
    public function all();

    public function login(object $request);

    public function register(array $create);

    public function logout();
}