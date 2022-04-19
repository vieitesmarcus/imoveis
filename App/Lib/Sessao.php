<?php

namespace App\Lib;

class Sessao
{

    public static function gravaMensagem(string $mensagem): void
    {
        $_SESSION['mensagem'] = $mensagem;
    }

    public static function limpaMensagem(): void
    {
        unset($_SESSION["mensagem"]);
    }
}