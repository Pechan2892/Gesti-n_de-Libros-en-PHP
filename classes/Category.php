<?php

// Category representa una categoria y proporciona los metodos para ealizar las operaciones de CRUD.

class Category {
    
    //atributos
    private $conn;
    private $table = 'categories';

    //constructor de la clase
    public function __construct($db){
        $this->conn = $db;
    }

    //metodo para agregar una categoria a la base de datos
    public function addCategory($name){
        //consulta para insertar una categoria
        $query = "INSERT INTO " . $this->table . "(name) VALUES(:name)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);

        //ejecutar la consulta
        return $stmt->execute();
    }

    //metodo para obtener todas las categorias
    public function getCategories(){
        //consulta para obtener todas las categorias
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);

        //ejecutar la consulta
        $stmt->execute();

        //devolver los resultados como un arreglo asociativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




}



?>