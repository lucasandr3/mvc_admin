<?php

namespace App\Services;

use App\Interfaces\Service\MensagemServiceInterface;
use App\Repositories\MensagemRepository;
use Utils\Utils;

class MensagemService implements MensagemServiceInterface
{
    private $repository;
    private $emailUtilsService;

    public function __construct()
    {
        $this->repository = new MensagemRepository;
        $this->emailUtilsService = new EmailUtilsService;
    }

    public function notificaAbandono(string $transaction)
    {
        $sale = $this->repository->mensagemAbandono($transaction)[0];
        $sale = json_decode($sale->cart);

        $message = "Olá ";
        $message .= $sale->buyerVO->name;
        $message .= "! Percebemos que você deixou um produto no carrinho. \n\n";
        $message .= "Uma vez que não queremos que você fique sem ele, receba um cupom de 10% de desconto para finalizar a compra nas próximas horas. \n\n";
        $message .= "Digite o código ";
        $message .= "TRANCA10 na página de pagamento.";
        echo "<pre>";
        var_dump($message);
        echo "</pre>";
        die;
        $link = url('').urlencode($message);
//        $link = "https://api.whatsapp.com/send?phone=55".$phone."&text=".urlencode($message);
        header("Location: ".$link);
        exit;
    }

    public function notificaBoleto(string $transaction)
    {
        $sale = $this->repository->mensagemBoleto($transaction)[0];

        $codArea = $sale->phone_checkout_local_code;
        $phoneClient = $sale->phone_number;
        $phone = Utils::numeroAjuste($codArea.$phoneClient);

        $message = "Olá ";
        $message .= $sale->first_name;
        $message .= "! Seja bem vinda(o) ao Curso de Tranças Diversas Bônus Afro! \n\n";
        $message .= "Nós recebemos o seu pedido ";
        $message .= $sale->transaction;
        $message .= " e agora estamos aguardando a confirmação do pagamento.\n\n";
        $message .= "Aqui está o link do seu boleto >>> ";
        $message .= $sale->billet_url."\n";
        $message .= "Aqui está o código de barras do boleto >>> ";
        $message .= $sale->billet_barcode."\n\n";
        $message .= "Sou a Nalva Giorgiutt criadora desse curso, qualquer dúvida me chame aqui!";

        $link = "https://api.whatsapp.com/send?phone=55".$phone."&text=".urlencode($message);
        header("Location: ".$link);
        exit;
    }

    public function notificaBoletoEmail(string $transaction, string $uuid)
    {
        $sale = $this->repository->mensagemBoletoEmail($transaction, $uuid)[0];
        $parametros = $this->emailUtilsService->getParametros($uuid)[0];

        $subject = "Detalhes da Sua Compra";

        $corpoEmail = $this->emailUtilsService->getCorpoEmail('EMAIL_BOLETO_GERADO', $uuid);

        $message = $this->corpoEmail($corpoEmail, $subject, $sale);
        $ad = ['lucasvieiracodetech@gmail.com', 'lucas-agnus@hotmail.com', 'lucasvieiraandrade58@gmail.com'];
        $status = $this->emailUtilsService->sendEmail($ad, $subject, $message, [], [], [], $parametros);

        if($status) {
            $response = ['code' => 0, 'message' => 'E-mail Enviado com sucesso'];
            echo json_encode($response);
            die;
        } else {
            $response = ['code' => 1, 'message' => $this->emailUtilsService->getError()];
            echo json_encode($response);
            die;
        }

    }

    public function notificaCartao(string $transaction)
    {
        $sale = $this->repository->MensagemCartao($transaction)[0];

        $codArea = $sale->phone_checkout_local_code;
        $phoneClient = $sale->phone_number;
        $phone = Utils::numeroAjuste($codArea.$phoneClient);

        $message = "Seja muito bem vinda(o) ";
        $message .= $sale->first_name;
        $message .= " ao Curso de Tranças Diversas Bônus Afro.\n\n";
        $message .= "É um prazer ter você aqui conosco neste super curso que irá dar um upgrade em sua vida profissional.\n\n";
        $message .= "Aqui é nosso WhatsApp de suporte, onde você poderá marcar um horário com nossa Cabeleireira e Trancista Nalva Giorgiutt.\n\n";
        $message .= "Horário de funcionamento do suporte é das 9:00 às 19:00 horas, de segunda a sexta, no sábado o horário é das 9:00 àas 17:30.";

        $link = "https://api.whatsapp.com/send?phone=55".$phone."&text=".urlencode($message);
        header("Location: ".$link);
        exit;
    }

    public function notificaCartaoEmail(string $transaction)
    {
        $sale = $this->repository->MensagemCartaoEmail($transaction)[0];

        $codArea = $sale->phone_checkout_local_code;
        $phoneClient = $sale->phone_number;
        $phone = Utils::numeroAjuste($codArea.$phoneClient);

        $message = "Seja muito bem vinda(o) ";
        $message .= $sale->first_name;
        $message .= " ao Curso de Tranças Diversas Bônus Afro.\n\n";
        $message .= "É um prazer ter você aqui conosco neste super curso que irá dar um upgrade em sua vida profissional.\n\n";
        $message .= "Aqui é nosso WhatsApp de suporte, onde você poderá marcar um horário com nossa Cabeleireira e Trancista Nalva Giorgiutt.\n\n";
        $message .= "Horário de funcionamento do suporte é das 9:00 às 19:00 horas, de segunda a sexta, no sábado o horário é das 9:00 àas 17:30.";
echo "<pre>";
var_dump($message);
echo "</pre>";
die;
        $link = "https://api.whatsapp.com/send?phone=55".$phone."&text=".urlencode($message);
        header("Location: ".$link);
        exit;
    }

    public function notificaPix(string $transaction)
    {
        // TODO: Implement notificaPix() method.
    }

    public function notificaWallet(string $transaction)
    {
        // TODO: Implement notificaWallet() method.
    }

    private function corpoEmail($corpo, $subject, $sale): string
    {
        $bodyEmail = $corpo->email_corpo;

        return sprintf(
            $bodyEmail,
//            $subject,
            $sale->first_name,
            $sale->transaction,
            $sale->billet_url,
            $sale->billet_barcode,
            'https://api.whatsapp.com/send?phone=5534991823557&text=Ol%C3%A1%2C%20preciso%20de%20ajuda!!',
        );
    }
}