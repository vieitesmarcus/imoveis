<?php

namespace App\Model\Dao;

use PDO;

class BaseDao
{
    private PDO $connection;

    public function __construct()
    {
        
    }
}