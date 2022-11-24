<?php

namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\InsertDataController;
use App\Controllers\DouglasController;

trait Post
{

    private static $processServerElements;

    private static function post()
    {
        switch (self::$processServerElements->getRoute()) {

            case '/insert-data':
                return (new InsertDataController)->exec();
                break;
            case '/arving2':
                return (new DouglasController)->arving2();
                break;

        }
    }

}