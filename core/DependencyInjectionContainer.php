<?php

namespace Core;

use Illuminate\Container\Container;

class DependencyInjectionContainer
{
    public function register($class)
    {
        $container = Container::getInstance();

        // Binds Login
        $container->bind(\App\Interfaces\Service\LoginServiceInterface::class, \App\Services\LoginService::class);
        $container->bind(\App\Interfaces\Repository\LoginRepositoryInterface::class, \App\Repositories\LoginRepository::class);

        // Binds Conta
        $container->bind(\App\Interfaces\Service\ContaServiceInterface::class, \App\Services\ContaService::class);
        $container->bind(\App\Interfaces\Repository\ContaRepositoryInterface::class, \App\Repositories\ContaRepository::class);

        // Binds Email Utils
        $container->bind(\App\Interfaces\Service\EmailUtilsServiceInterface::class, \App\Services\EmailUtilsService::class);
        $container->bind(\App\Interfaces\Repository\EmailUtilsRepositoryInterface::class, \App\Repositories\EmailUtilsRepository::class);

        $instance = $container->make($class);

        return $instance;
    }
}