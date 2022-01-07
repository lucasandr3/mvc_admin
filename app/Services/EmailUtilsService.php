<?php

namespace App\Services;

use App\Interfaces\Service\EmailUtilsServiceInterface;
use App\Repositories\EmailUtilsRepository;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;
use Support\Validacao;

class EmailUtilsService implements EmailUtilsServiceInterface
{
    private $repository;
    private $validacao;
    private $error;

    public function __construct()
    {
        $this->repository = new EmailUtilsRepository;
        $this->validacao = new Validacao;
    }

    public function getParametros($uuidUser)
    {
        return $this->repository->parametros($uuidUser);
    }

    public function editarDadosEmail(object $dados)
    {
        if($dados->request->acao === 'salvar') {

            $create = [
                'uuid_user'    =>  $dados->usuario->uuid,
                'email_host'   => $this->validacao->validaString($dados->request->email_host),
                'email_user'   => $this->validacao->validaString($dados->request->email_user),
                'email_pass'   => $this->validacao->validaString($dados->request->email_pass),
                'email_secure' => $this->validacao->validaString(strtolower($dados->request->email_secure)),
                'email_port'   => $this->validacao->validaString($dados->request->email_port),
                'email_from'   => $this->validacao->validaEmail($dados->request->email_from),
                'email_name'   => $this->validacao->validaString($dados->request->email_name)
            ];

            $this->repository->criarDadosEmail($create);
            
        } else {

            $update = [
                'email_host' => $this->validacao->validaString($dados->request->email_host),
                'email_user' => $this->validacao->validaString($dados->request->email_user),
                'email_pass' => $this->validacao->validaString($dados->request->email_pass),
                'email_secure' => $this->validacao->validaString(strtolower($dados->request->email_secure)),
                'email_port' => $this->validacao->validaString($dados->request->email_port),
                'email_from' => $this->validacao->validaEmail($dados->request->email_from),
                'email_name' => $this->validacao->validaString($dados->request->email_name)
            ];

            $this->repository->editarDadosEmail($update, $dados->usuario->uuid);
        }
    }

    public function getcorpoEmail($type, $uuid)
    {
        return $this->repository->getCorpo($type, $uuid);
    }

    public function sendEmail($addresses, $subject, $body, $attachements, $ccs, $bccs, $parametros)
    {
        $this->error = '';

        $mail = new PHPMailer(true);

        try {
            // Credenciais
            $mail->isSMTP(true);
            $mail->Host = $parametros->email_host;
            $mail->SMTPAuth = true;
            $mail->Username = $parametros->email_user;
            $mail->Password = $parametros->email_pass;
            $mail->SMTPSecure = $parametros->email_secure;
            $mail->Port = $parametros->email_port;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('br');

            // Remetente
            $mail->setFrom($parametros->email_from, $parametros->email_name);

            // Destinatarios
            $addresses = is_array($addresses) ? $addresses : [$addresses];
            foreach ($addresses as $address) {
                $mail->addAddress($address);
            }

            // Anexos
            $attachements = is_array($attachements) ? $attachements : [$attachements];
            foreach ($attachements as $attachement) {
                $mail->addAttachment($attachement);
            }

            // CCS
            $ccs = is_array($ccs) ? $ccs : [$ccs];
            foreach ($ccs as $cc) {
                $mail->addCC($cc);
            }

            // BCCS
            $bccs = is_array($bccs) ? $bccs : [$bccs];
            foreach ($bccs as $bcc) {
                $mail->addBCC($bcc);
            }

            // Conteudo do email
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            return $mail->send();

        } catch (PHPMailerException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }

    public function getError()
    {
        return $this->error;
    }
}