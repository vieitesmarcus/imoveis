<?php 

namespace App\Http;

class Response
{
    /**
     * Codigo do Status HTTP
     * @var integer
     */
    private $httpCode = 200;

    /**
     * cabeçalho do Response
     * @var array
     */
    private $headers = [];

    /**
     * Tipo de Conteúdo que está sendo retornado
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Conteúdo do Response
     * @var mixed
     */
    private $content;

    /**
     * Método responsável por iniciar a classe e definir os valores
     * @param integer $httpCode
     * @param mixed
     * @param strintg
     */
    public function __construct(int $httpCode , $content, string $contentType = 'text/html')
    {
        $this->httpCode    = $httpCode;
        $this->content     = $content;
        $this->setContentType($contentType);
    }

    /**
     * Método responsável por alterar o content type do response
     * @param string $contentType
     */
    public function setContentType(string $contentType): void
    {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /**
     * Método responsável por adicionar um registro no cabeçalho de response
     * @param string $key
     * @param string $value
     */
    public function addHeader(string $key,string $value):void
    {
        $this->headers[$key] = $value;
    }

    public function sendResponse(): void
    {
        //ENVIAR OS HEADERS
        $this->sendHeaders();
        
        //IMPRIME OS CONTEUDOS
        switch($this->contentType){
            case 'text/html':
                echo $this->content;
                break;
        }
    }

    private function sendHeaders(): void
    {
        //STATUS
        http_response_code($this->httpCode);

        //ENVIAR HEADERS
        foreach($this->headers as $key=>$value){
            header($key.': '.$value);
        }
    }
}