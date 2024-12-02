<?php
// Database representa la base de datos y proporciona los metodos para ealizar las operaciones de CRUD.
class Database {

    //atributos
    private $host = 'localhost';
    private $db_name = 'bibliotech';
    private $username = 'root';
    private $password = '';
    public $conn;

    //constructor
    public function connect() {


        //inicializar la base de datos
        $this->conn = null;

        //crear la base de datos
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }

        //devolver la base de datos
        return $this->conn;
    }
}
?>
