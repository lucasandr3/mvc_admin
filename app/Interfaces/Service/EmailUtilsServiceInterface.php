<?php

namespace App\Interfaces\Service;

interface EmailUtilsServiceInterface
{
    public function getParametros(string $uuidUser);

    public function editarDadosEmail(object  $dados);

    public function getcorpoEmail(string $type, string $uuid);

    public function sendEmail($addresses, $subject, $body, $attachements, $ccs, $bccs, $parametros);

    public function getError();
}
