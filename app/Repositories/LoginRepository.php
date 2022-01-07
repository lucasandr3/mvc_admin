<?php
namespace App\Repositories;

use App\Interfaces\Repository\LoginRepositoryInterface;
use App\Models\User;
use Support\Authenticate;
use Illuminate\Database\Capsule\Manager as DB;

class LoginRepository implements LoginRepositoryInterface
{
    public function all()
    {
        return User::all();
    }

    public function login(Object $request)
    {
       $user = User::where('user_email', $request->user_email)->first();

       if($user) {

            if (password_verify($request->user_pass, $user->user_pass)) {
                $permissoes = DB::table('permissao_has_user as phu')
                    ->addSelect('gp.grupo')
                    ->addSelect('p.nome')
                    ->join('grupo_permissoes as gp', 'gp.id', '=', 'phu.id_grupo')
                    ->join('permissoes as p', 'p.id', '=', 'phu.id_permissao')
                    ->where('phu.id_grupo', $user->permissao)
                    ->get()->toArray();
                Authenticate::setUser($user, $permissoes);
                Authenticate::redirectHome('');
            } else {
                Authenticate::redirect('login/login', [
                    'type' => 'error',
                    'title' => 'Aviso',
                    'text' => 'Login e/ou senha errados!'
                    ]
                );
            }

       } else {
            Authenticate::redirect('login/login', [
                'type' => 'error',
                'title' => 'Aviso',
                'text' => 'Login e/ou senha errados.'
                ]
            );
       }
       
    }

    public function register($create)
    {
        return User::insert($create);
    }

    public function logout()
    {
        Authenticate::logout();
        Authenticate::redirect('login/login', []);
    }
}