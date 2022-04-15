<?php

use App\Http\Router;
use App\Utils\View;

require __DIR__ . '/vendor/autoload.php';

define('URL', 'https://localhost/imoveis');

View::init([
    'URL' => URL
]);

//inicia o roteador
$obRouter = new Router(URL);

//INCLUI AS ROTAS DAS PÁGINAS
include __DIR__ .'/routes/pages.php';


//IMPRIME O RESPONSE DA ROTA    
$obRouter->run()->sendResponse();