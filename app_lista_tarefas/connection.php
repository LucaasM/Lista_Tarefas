<?php

    class Connection{
        
        private $host = 'localhost';
        private $dbname = 'php_com_pdo';
        private $user = 'root';
        private $password = '';
        

        public function to_connect() {

        
            try{
                $connection = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname",
                    "$this->user",
                    "$this->password"
                );

                return $connection;

            } catch(PDOExecption $e){
                echo '<p>' . $e->getMessage() . '</p>';           
            }
            
        }       

             
        
    }





?>