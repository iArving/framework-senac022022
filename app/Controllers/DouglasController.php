<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;
use App\FrameworkTools\Database\DatabaseConnection;

class DouglasController extends AbstractControllers {

    private $params;
    private $attrName;

    public function arving1() {
        $pdo = DatabaseConnection::start()->getPDO();

        $petshop = $pdo->query("SELECT * FROM petshop;")->fetchAll();

        view($petshop);
    }

    public function arving2() {
        try {

            $response = ['success'=> true];

            $this->params = $this->processServerElements->getInputJSONData();
    
            $this->verificationInputVar();
    
            $query = "INSERT INTO petshop (name_pet,type_service) VALUES (:name_pet,:type_service)";
            
            $statement = $this->pdo->prepare($query); 

            $statement->execute([
                ':name_pet' => $this->params["name_pet"],
                ':type_service' => $this->params["type_service"]
            ]);

        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'missingAttribute' => $this->attrName
            ];
        }

        view($response);

    }

    private function verificationInputVar() {
        
        if (!$this->params['name_pet']) {
            $this->attrName = 'name_pet';
            throw new \Exception('the name_pet has to ben send in the request');
        }

        if (!$this->params['type_service']) {
            $this->attrName = 'type_service';
            throw new \Exception('the type_service has to be send in the request');
        }

    }

}