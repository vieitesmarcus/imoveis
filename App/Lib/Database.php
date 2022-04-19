<?php

namespace App\Lib;

use PDO;
use PDOException;

class Database
{
    const HOST = 'localhost';
    const NAME = 'imoveis';
    const USER = 'root';
    const PASS = '';

    //nome da tabela a ser manipulada
    private string $table;

    //instancia de conexão com o banco de dados
    private PDO $connection;

    //define a tabela e instacia e conexão
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection(): void
    {
        try{
            $this->connection = new Pdo(
                'mysql:host='.self::HOST . ';dbname='.self::NAME,
                self::USER,
                self::PASS
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '. $e->getMessage());
        }
    }
}