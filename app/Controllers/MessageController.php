<?php
namespace App\Controllers;

use App\Services\MensagemService;
use Core\Controller;

class MessageController extends Controller
{
    private $MensagemService;

    public function __construct()
    {
        $this->MensagemService = new MensagemService;
    }

    public function messageAbandono($transaction)
    {
        $this->MensagemService->notificaAbandono($transaction);
    }

    public function messageBoleto($transaction)
    {
        $this->MensagemService->notificaBoleto($transaction);
    }

    public function messageBoletoEmail($transaction)
    {
        $uuid = $this->user()->uuid;
        $this->MensagemService->notificaBoletoEmail($transaction, $uuid);
    }

    public function messageCartao($transaction)
    {
        $this->MensagemService->notificaCartao($transaction);
    }

    public function messageCartaoEmail($transaction)
    {
        $this->MensagemService->notificaCartaoEmail($transaction);
    }

    public function messageWelcome($sale)
    {

        $codArea = $sale['cliente']['phone_checkout_local_code'];
        $phoneClient = $sale['cliente']['phone_number'];
        $phone = $codArea.$phoneClient;

        $message = "Seja muito bem vinda(o) ";
        $message .= $sale['cliente']['first_name'];
        $message .= " ao Curso de Tranças Diversas Bônus Afro.\n\n";
        $message .= "É um prazer ter você aqui conosco neste super curso que irá dar um upgrade em sua vida profissional.\n\n";
        $message .= "Aqui é nosso WhatsApp de suporte, onde você poderá marcar um horário com nossa Cabeleireira e Trancista Nalva Giorgiutt.\n\n";
        $message .= "Horário de funcionamento do suporte é das 9:00 às 19:00 horas, de segunda a sexta, no sábado o horário é das 9:00 àas 17:30.";

        $link = "https://api.whatsapp.com/send?phone=55".numeroNonoDigito($phone)."&text=".urlencode($message);
        header("Location: ".$link);
        exit;
    }

    public function notificacao()
    {
        $uuid = $this->user()->uuid;

        $breadcrumb = [
            'Home' => ['link' => '', 'active' => ''],
            'Mensagens' => ['link' => '', 'active' => ''],
            'Notificação' => ['link' => '', 'active' => '']
        ];

        render('notificacao/notificacao', [
            'breadcrumb' => $breadcrumb
        ]);
    }
}