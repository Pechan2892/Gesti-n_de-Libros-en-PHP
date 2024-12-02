<?php

// Author representa un autor y proporciona los metodos para ealizar las operaciones de CRUD.

class Author{
    private $conn;
    private $table = 'authors';

    //constructor de la clase
    public function __construct($db){
        $this->conn = $db;
    }

    //metodo para agregar un autor a la base de datos
    public function addAuthor($name){

        //consulta para insertar un autor
        $query = "INSERT INTO  $this->table . (name) VALUES(:name)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);

        //ejecutar la consulta
        return $stmt->execute();
    }

    //metodo para obtener todos los autores 
    public function getAuthors(){

        //consulta para obtener todos los autores
        $query = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($query);

        //ejecutar la consulta
        $stmt->execute();

        //devolver los resultados como un arreglo asociativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>