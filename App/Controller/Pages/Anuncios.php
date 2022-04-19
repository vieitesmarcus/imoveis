<?php

namespace App\Controller\Pages;

use App\Model\Entity\Anuncio;
use App\Model\Entity\Endereco;
use App\Utils\View;

class Anuncios extends Page
{

    public static function getAnunciosPage(): string
    {
        $obAnuncio = new Anuncio();
        
        $obAnuncio->descricao = "Lorem ipsum dolor sit, amet consectetur adipisicing elit.  dignissimos deleniti enim fugit quia, neque nemo aperiam provident laboriosam dolorum!";
       
        $obEndereco = new Endereco();
        $obEndereco->cadastraEndereco(1, "rua carlos","Santos");
        $obAnuncio->setEndereco($obEndereco);


        return $content = View::render('anuncios/anuncios', [
            'valor' => '7.500.000',
            'condominio'=> '460',
            'iptu' => '6.000',
            'descricao' => $obAnuncio->descricao,
            'endereco' => $obAnuncio->getEndereco()->rua .', '. $obAnuncio->getEndereco()->cidade
        ]);
    }

    public static function getAnuncios(): string
    {
        $obAnuncio = new Anuncio();
        
        $obAnuncio->descricao = "Lorem ipsum dolor sit, amet consectetur adipisicing elit.  dignissimos deleniti enim fugit quia, neque nemo aperiam provident laboriosam dolorum!";
       
        $obEndereco = new Endereco();
        $obEndereco->cadastraEndereco(1, "rua carlos","Santos");
        $obAnuncio->setEndereco($obEndereco);


        $content = View::render('anuncios/anuncios', [
            'valor' => '7.500.000',
            'condominio'=> '460',
            'iptu' => '6.000',
            'descricao' => $obAnuncio->descricao,
            'endereco' => $obAnuncio->getEndereco()->rua .', '. $obAnuncio->getEndereco()->cidade
        ]);

        return parent::getPage('Anuncios', $content);
    }
}