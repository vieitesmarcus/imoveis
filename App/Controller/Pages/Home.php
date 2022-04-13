<?php

namespace App\Controller\Pages;

use App\Utils\View;

class Home extends Page
{
    public static function getHome(): string
    {
        $content = View::render('pages/index', []);

        return parent::getPage('Index - Anuncios', $content);
    }
}
