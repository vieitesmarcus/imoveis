<?php
namespace App\Controller\Pages;

use App\Utils\View;

class Page
{
    /**
     * Método responsável por renderizar o CABEÇALHO da página
     */
    private static function getHeader(): string
    {
        return View::render('pages/header');
    }

    /**
     * Método responsável por renderizar o RODAPÉ da página
     */
    private static function getFooter(): string
    {
        return View::render('pages/footer');
    }

    public static function getPage(string $title, string $content): string
    {
        return View::render('pages/page',[
            'title'   => $title,
            'header'  => self::getHeader(),
            'content' => $content,
            'footer'  => self::getFooter()
        ]);
    }
}