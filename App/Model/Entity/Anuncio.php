<?php

namespace App\Model\Entity;

use App\Lib\Database;

class Anuncio
{
    
    public int $id; //identificador unico do anuncio
    public string $data;
    public string $descricao; // descrição do anuncio
    public string $valor; // valor do anuncio
    public string $iptu; // valor do iptu
    public string $condominio; // valor do condomionio
    public string $urlFoto; // url da foto
    public Endereco $endereco;  // endereco do anuncio
    public int $id_usuario; // identificador do usuario que anunciou
    
    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of valor
     */ 
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */ 
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get the value of condominio
     */ 
    public function getCondominio()
    {
        return $this->condominio;
    }

    /**
     * Set the value of condominio
     *
     * @return  self
     */ 
    public function setCondominio($condominio)
    {
        $this->condominio = $condominio;

        return $this;
    }

    /**
     * Get the value of endereco
     */ 
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     *
     * @return  self
     */ 
    public function setEndereco(Endereco $endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get the value of iptu
     */ 
    public function getIptu()
    {
        return $this->iptu;
    }

    /**
     * Set the value of iptu
     *
     * @return  self
     */ 
    public function setIptu($iptu)
    {
        $this->iptu = $iptu;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of id_usuario
     */ 
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */ 
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    //cadastrar novo anuncio
    public function cadastrar(): void
    {
        //definir a data 
        $this->data = date('Y-m-d H:i:s');
        //inserir o anuncio no banco
        $obDatabase = new Database('anuncios');
        echo '<pre>';
            print_r($obDatabase);
        echo '</pre>';exit();
        //atribuir o id no anuncio
    }
}