<?php

namespace App\Interfaces\Service;

interface MensagemServiceInterface
{
    public function notificaAbandono(string $transaction);

    public function notificaBoleto(string $transaction);

    public function notificaBoletoEmail(string $transaction, string $uuid);

    public function notificaCartao(string $transaction);

    public function notificaCartaoEmail(string $transaction);

    public function notificaPix(string $transaction);

    public function notificaWallet(string $transaction);
}