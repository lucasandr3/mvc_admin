<?php
namespace App\Services;

use App\Interfaces\Service\LoginServiceInterface;
use App\Repositories\LoginRepository;
use Rakit\Validation\Validator;
use Support\Authenticate;
use Ramsey\Uuid\Uuid; //carregando a classe UUID

class LoginService implements LoginServiceInterface
{
    private $repository;
    private $webhookService;
    private $validator;

    public function __construct ()
    {
        $this->repository = new LoginRepository;
        $this->webhookService = new WebhookService;
        $this->validator = new Validator;
    }

    public function all()
    {
        $data['clientes'] = $this->repository->all();
        return $data;
    }

    public function signin(Object $request)
    {

        $validation = $this->validator->make($request->request->all(), [
            'user_email' => 'required|email',
            'user_pass' => 'required|min:3',
        ]);

        if(!$validation->fails()) {
            $this->repository->login((object)$request->request->all());
        }

        Authenticate::redirect('login/login', [
            'type' => 'error',
            'title' => 'Aviso',
            'text' => 'Dados informados incorretos.'
            ]
        );
    }

    public function register(Object $request)
    {
        $validation = $this->validator->make($request->all(), [
            'user_name' => 'required',
            'user_email' => 'required|email',
            'user_pass' => 'required|min:6',
        ]);

        if(!$validation->fails()) {

            $uuidUser = Uuid::uuid1();

            $create = [
                'uuid_user' => $uuidUser->toString(),
                'user_name' => $request->get('user_name'),
                'user_email' => $request->get('user_email'),
                'user_pass' => password_hash($request->get('user_pass'), PASSWORD_DEFAULT),
            ];

            $insert = $this->repository->register($create);

            if($insert) {
                $this->webhookService->criaLinks($create['uuid_user']);
                $user = (object)[
                    'user_email' => $request->get('user_email'),
                    'user_pass' => $request->get('user_pass')
                ];
                $this->repository->login($user);
            } else {
                Authenticate::redirect('cadastro');
            }
        }

        echo "<pre>";
        var_dump($validation->errors());
        echo "</pre>";
        die;

    }

    public function logout()
    {
        $this->repository->logout();
    }
}