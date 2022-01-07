<?php
use League\Plates\Engine;
use Support\Authenticate;

function render($view, $data=null)
{
    $user = (Object)Authenticate::getUser() ?? null;

    $templates = new Engine('themes/layout'.LAYOUT);
    $templates->addData([
        'company' => 'ZapKeep',
        'id_user' => $user->id ?? 0,
        'username' => $user->nome ?? '',
        'email' => $user->email ?? ''
        ],
'template');
    $templates->addFolder('tema', 'themes/theme'.THEME);
    echo $templates->render('tema::'.$view, $data);

    if(isset($data['message'])) {
        sweetAlert($data['message']);
    }
}

function view($view, $data=null)
{
    $templates = new Engine('themes/theme'.THEME);
    echo $templates->render($view, $data);

    if(isset($data['message'])) {
        sweetAlert($data['message']);
    }
}