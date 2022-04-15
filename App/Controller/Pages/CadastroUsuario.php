<?php

namespace App\Controller\Pages;

use App\Utils\View;

class CadastroUsuario extends Page
{
    //carrega a pagina de cadastro de usuarios
    public static function getCadastro(): string
    {
        
        $content = View::render('pages/cadastroUsuario', [
            
        ]);

        return parent::getPage('Cadastro de Usuarios', $content);
    }
}