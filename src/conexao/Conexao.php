<?php 

class Conexao {
    static $instancia;

    public function getInstancia():PDO {
        try {
            if(self::$instancia == null) {
                self::$instancia = new PDO("pgsql:host=localhost;
                port=5432;
                dbname=crudpessoa",
        "postgres",
        "234588");
        self::$instancia->setAttribute(PDO::ATTR_ERRMODE,
         PDO::ERRMODE_EXCEPTION);
            }
            return self::$instancia;
        } catch (PDOException $e) {
            die("DATABASE ERROR: ".$e->getMessage());
        }
    }
}

?>