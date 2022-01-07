<?php
namespace Core;

use League\Plates\Engine;
use Support\Authenticate;
use Symfony\Component\HttpFoundation\Request;

class Controller {

    public function render($view, $data = null)
    {
        $user = $this->user() ?? null;

        $templates = new Engine('themes/layout'.LAYOUT);
        $templates->addData([
            'company' => 'Admin',
            'id_user' => $user->id ?? 0,
            'username' => $user->nome ?? '',
            'email' => $user->email ?? '',
            'photo' => $user->photo ?? ''
        ],
            'template');
        $templates->addFolder('tema', 'themes/theme' . THEME);
        echo $templates->render('tema::' . $view, $data);

        if (isset($data['message'])) {
            sweetAlert($data['message']);
        }
    }

    public function view($view, $data = null)
    {
        $templates = new Engine('themes/theme'.THEME);
        echo $templates->render($view, $data);

        if (isset($data['message'])) {
            sweetAlert($data['message']);
        }
    }

    public function redirect($route, $message = null)
    {
        header("Location: ".$_ENV['APP_URL'].$route);
    }

    public function request()
    {
        return Request::createFromGlobals();
    }

    public function user()
    {
        $user = (object)Authenticate::getUser();
        return $user;
    }
}