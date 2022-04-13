<?php

namespace App\Utils;

class View
{
    //Método por retornar o conteudo de uma view
    private static function getContent(string $view): string
    {
        $file = __DIR__ . '/../View/'.$view.'.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }

    //Método responsável por retornar o conteudo renderizado da view

    public static function render(string $view, array $vars = []): string
    {
        //conteudo da view
        $contentView = self::getContent($view);

        $keys = array_keys($vars);

        $keys = array_map(function($item){
            return '{{'.$item.'}}';
        }, $keys);

        return str_replace($keys, array_values($vars), $contentView);
        
    }
}