<?php

namespace App\Repositories;

use App\Interfaces\Repository\EmailUtilsRepositoryInterface;
use App\Models\EmailParametros;
use Illuminate\Database\Capsule\Manager as DB;
use Support\Authenticate;


class EmailUtilsRepository implements EmailUtilsRepositoryInterface
{
    public function parametros($uuidUser)
    {
        return DB::table('parametros_email')
            ->where('uuid_user', $uuidUser)
        ->get();
    }

    public function getCorpo(string $type, string $uuid)
    {
        return DB::table('corpo_email')
            ->select('email_corpo')
            ->where('email_type','EMAIL_BOLETO_GERADO')
            ->where('uuid_user', $uuid)
            ->get()[0];
    }

    public function criarDadosEmail(array $create)
    {
        EmailParametros::insert($create);
        Authenticate::redirect('conta');
    }

    public function editarDadosEmail(array $update, string $uuid)
    {
        $email = EmailParametros::where('uuid_user', $uuid);
        $email->update($update);
        Authenticate::redirect('conta');
    }
}