<?php

namespace App\Controller\Pages;

use App\Utils\View;

class Login extends Page
{
    //carrega a pagina de cadastro de usuarios
    public static function getLogin(): string
    {
        
        $content = View::render('pages/login', [

        ]);

        return parent::getPage('Login de Usuários', $content);
    }
}