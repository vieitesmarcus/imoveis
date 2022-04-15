<?php

namespace App\Http;

class Request
{
    /**
     * Método HTTP da requisição
     * @var string
     */
    private string $httpMethod;

    /**
     * URI da página
     *@var string
     */
    private $uri;

    /**
     * Parámetros da URL ($_GET)
     *@var array
     */
    private $queryParams = [];

    /**
     * Variáveis recebidas no POST da página ($_POST)
     * @var array
     */
    private $postVars = [];

    /**
     * Cabeçalho da requisicao
     * @var array
     */
    private $headers = [];

    /** 
     * Construtor da classe
     */
    public function __construct()
    {
        $this->queryParams = $_GET  ?? [];
        $this->postVars    = $_POST ?? [];
        $this->headers     = getallheaders();
        $this->httpMethod  = $_SERVER["REQUEST_METHOD"] ?? '';
        $this->uri         = $_SERVER["REQUEST_URI"]    ?? '';
    }

    /**Método responsavel por retornar o método HTTP da requisição
     *@return string
     */
    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    /**Método responsavel por retornar o método HTTP da requisição
     *@return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**Método responsavel por retornar o método HTTP da requisição
     *@return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**Método responsavel por retornar o método HTTP da requisição
     *@return array
     */
    public function getPostVars(): array
    {
        return $this->postVars;
    }

    /**Método responsavel por retornar o método HTTP da requisição
     *@return array
     */
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }
}
