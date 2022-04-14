<?php

use App\Controller\Pages\Home;
use App\Model\Dao\BaseDao;

require __DIR__ . '/vendor/autoload.php';


echo Home::getHome();