<?php

namespace App\Controller\Pages;

use App\Model\Entity\Usuario;
use App\Utils\View;

class CadastroUsuario extends Page
{
    //carrega a pagina de cadastro de usuarios
    public static function getCadastro(): string
    {
        
        $obUsuario = new Usuario();
        $obUsuario->cadastrar();

        $content = View::render('pages/cadastroUsuario', [
            
        ]);

        return parent::getPage('Cadastro de Usuarios', $content);
    }
}