<?php

namespace App\Model\Entity;

class Anuncio
{
    public int $id;
    public string $descricao;
    public string $valor;
    public string $iptu;
    public string $condominio;
    public string $urlFoto;
    public Endereco $endereco;
    
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
}