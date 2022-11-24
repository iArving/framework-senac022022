<?php

namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\UpdateDataController;
use App\Controllers\DouglasController;

trait Put
{

    private static function put()
    {
        switch (self::$processServerElements->getRoute()) {
            case '/update-data':
                return (new UpdateDataController)->exec();
                break;
            case '/arving3':
                return (new DouglasController)->arving3();
                break;
        }
    }
}