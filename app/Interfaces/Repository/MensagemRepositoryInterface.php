<?php

namespace App\Interfaces\Repository;

interface MensagemRepositoryInterface
{
    public function mensagemAbandono(string $transaction);

    public function mensagemBoleto(string $transaction);

    public function mensagemBoletoEmail(string $transaction, string $uuid);

    public function MensagemCartao(string $transaction);

    public function MensagemCartaoEmail(string $transaction);

    public function MensagemPix(string $transaction);

    public function MensagemWallet(string $transaction);

}