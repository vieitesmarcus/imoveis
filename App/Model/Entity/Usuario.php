<?php

namespace App\Model\Entity;

use App\Lib\Database;

class Usuario
{
    private int $id;
    private string $login;
    private string $senha;

    


    /**
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    public function cadastrar(): void
    {
        //definir a data 
        $this->data = date('Y-m-d H:i:s');
        //inserir o anuncio no banco
        $obDatabase = new Database('usuarios');
        // echo '<pre>';
        //     print_r($obDatabase);
        // echo '</pre>';
        //atribuir o id no anuncio
    }
}