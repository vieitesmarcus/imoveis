<?php

namespace App\Controller\Pages;

use App\Model\Entity\Anuncio;
use App\Model\Entity\Endereco;
use App\Utils\View;

class Home extends Page
{
    public static function getHome(): string
    {
        
        $content = View::render('pages/home', [
            'itens' => Anuncios::getAnunciosPage()
        ]);

        return parent::getPage('Index - Anuncios', $content);
    }
}
