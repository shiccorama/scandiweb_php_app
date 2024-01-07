<?php  

    class Database{

        private $dsn = "mysql:host=localhost;dbname=scandiwebdb";
        private $username = "root";
        private $password = "";
        public $conn;

        public function __construct(){
            try{
                $this->conn = new PDO($this->dsn, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "connected successfully!";
        
            }catch(PDOException $e){
                echo "Connection Failed " . $e->getMessage();
            }

        }

    
    }

?>