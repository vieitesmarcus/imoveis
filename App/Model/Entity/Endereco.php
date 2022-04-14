<?php

namespace App\Model\Entity;

class Endereco
{
    public int $id;
    public string $rua;
    public string $cidade;


    public function cadastraEndereco(int $id, string $rua, string $cidade)
    {
        $this->id = $id;
        $this->rua = $rua;
        $this->cidade = $cidade;
    }

    



    
}