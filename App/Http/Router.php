<?php

namespace App\Http;

use \Closure;
use \Exception;
use \ReflectionFunction;

class Router
{
    //URL completa do projeto
    private string $url = '';

    //Prefixo de todas as ROTAS
    private string $prefix = '';

    //INDICES de ROTAS 
    private array $routes = [];

    private Request $request;

    //inicia a classe
    public function __construct(string $url)
    {
        $this->request = new Request();
        $this->url     = $url;
        $this->setPrefix();
    }

    private function setPrefix(): void
    {
        //Informações da url
        $parseUrl = parse_url($this->url);
        
        //DEFINE O PREFIXO
        $this->prefix = $parseUrl['path'] ?? '';
    }

    //adiciona uma rota na classe
    private function addRoute(string $method,string $route,array $params = []): void
    {
       
        //VALIDAÇÃO DOS PARÂMETROS
        foreach($params as $key=>$value){
            if($value instanceof Closure){
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        //VARIÁVEIS DA ROTA
        $params['variables'] = [];

        //PADRÃO DE VALIDAÇÃO DAS VARIÁVEIS DAS ROTAS
        $patternVariable = '/{(.*?)}/';
        if(preg_match_all($patternVariable, $route, $matches)){
            $route = preg_replace($patternVariable,'(.*?)', $route);
            $params['variables']  = $matches[1];
        }

        //padrão de validação da URL
        $patternRoute = '/^'.str_replace('/','\/', $route).'$/';
        

        //ADICIONA A ROTA DENTRO DA CLASSE
        $this->routes[$patternRoute][$method] = $params;
    }

    // define uma rota de GET
    public function get(string $route, array $params = []): mixed
    {
        return $this->addRoute('GET', $route, $params);
    }

    // define uma rota de POST
    public function post(string $route, array $params = []): mixed
    {
        return $this->addRoute('POST', $route, $params);
    }

    // define uma rota de PUT
    public function put(string $route, array $params = []): mixed
    {
        return $this->addRoute('PUT', $route, $params);
    }

    // define uma rota de DELETE
    public function delete(string $route, array $params = []): mixed
    {
        return $this->addRoute('DELETE', $route, $params);
    }

    // RETORNA A URI DESCONSIDERANDO O PREFIX
    private function getUri(): string
    {
        $uri = $this->request->getUri();
        
        //DIVIDE A URI COM O PREFIX
        $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];
        
        //retorna a uri sem o prefix
        return end($xUri);
    }

    //RETORNA OS DADOS DA ROTA ATUAL
    private function getRoute(): array
    {
        //URI
        $uri = $this->getUri();
        
        //METHOD
        $httpMethod = $this->request->getHttpMethod();

        //valida as rotas
        foreach($this->routes as $patternRoute => $methods){
           if(preg_match($patternRoute, $uri, $matches)){
               //verifica o método
                if(isset($methods[$httpMethod])){
                    //destroi a primeira posição porquê não haverá uso
                    unset($matches[0]);

                    //CHAVES
                    $keys = $methods[$httpMethod]['variables'];
                    $methods[$httpMethod]['variables'] = array_combine($keys, $matches);
                    $methods[$httpMethod]['variables']['request'] = $this->request;


                    //RETORNO DOS PARÂMETROS DA ROTA
                    return $methods[$httpMethod];
                }

                //Metodo não permitido/definido
                throw new Exception("Método não permitido", 405);
           }
        }
        //URL NÃO ENCONTRADA
        throw new Exception("URL não encontrada", 404);
    }

    //EXECUTA A ROTA ATUAL
    public function run()
    {
        try{
            //OBTÉM A ROTA ATUAL
            $route = $this->getRoute();
            // echo '<pre>';
            //     print_r($route);
            // echo '</pre>';exit();
            if(!isset($route['controller'])){
                throw new Exception("A URL não pôde  ser processada", 500);
            }
            //ARGUMENTOS DA FUNÇÃO
            $args = [];

            //REFLECTION
            $reflection = new ReflectionFunction($route['controller']);
            foreach($reflection->getParameters() as $parameter){
                $name = $parameter->getName();
                $args[$name] = $route['variables'][$name] ?? '';
            }
            

            //RETORNA A EXECUÇÃO DA FUNÇÃO 
            return call_user_func_array($route['controller'], $args);

        }catch(Exception $e){
            return new Response($e->getCode(), $e->getMessage());
        }
    }
}