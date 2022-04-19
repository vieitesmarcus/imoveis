<?php

use App\Http\Response;
use App\Controller\Pages;

//ROTA HOME
$obRouter->get('/', [
    function(){
        return new Response(200, Pages\Home::getHome());
    }
]);

//ROTA SOBRE
$obRouter->get('/cadastro', [
    function(){
        return new Response(200, Pages\CadastroUsuario::getCadastro());
    }
]);

$obRouter->post('/cadastro', [
    function($request){
        return new Response(200, Pages\CadastroUsuario::getCadastro());
    }
]);

//ROTA DINÂMICA
$obRouter->get('/pagina/{idPagina}/{acao}', [
    function($idPagina, $acao){
        return new Response(200, 'Página '.$idPagina .' - '.$acao);
    }
]);

$obRouter->get('/login', [
    function(){
        return new Response(200, Pages\Login::getLogin());
    }
]);

$obRouter->post('/login', [
    function(){
        return new Response(200, Pages\Login::getLogin());
    }
]);

$obRouter->get('/anuncios', [
    function(){
        return new Response(200, Pages\Anuncios::getAnuncios());
    }
]);