<?php

namespace App\persistence;

use PDO;
use PDOException;
use App\SystemServices\MonologFactory;

class ConnectionFactory {

    private static $host = "localhost";
    private static $dbname = "PHP_PDO";
    private static $user = "root";
    private static $password = "";



public static function getConnectionFactory() {

    try{
        $pdo = new PDO('mysql:host=localhost;dbname=exercbd04', 'root', '');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $result = $pdo->query("SELECT * FROM funcionarios")->fetchAll();

        var_dump($result);


        MonologFactory::getInstance()->info("Conexão com banco sucedida!!!");
        return new ConnectionFactory();

        
        
    }
    catch(PDOException $e){

        MonologFactory::getInstance()->info("Erro na conexão" . $e->getMessage());
        MonologFactory::getInstance()->info("Erro não relacionado ao banco" . $e->getMessage());


    }

}
}    

?>
