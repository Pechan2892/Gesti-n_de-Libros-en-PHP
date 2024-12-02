<?php
// Book representa un libro y proporciona los metods para ealizar las operaciones de CRUD.

class Book {

    
    private $conn;
    private $table = 'books';

    public $id;
    public $title;
    public $author_id;
    public $category_id;
    public $status;

    //constructor
    public function __construct($db) {
        $this->conn = $db;
    }
//metodo para agregar un libro
    public function addBook($title, $author_id, $category_id) {
        $query = "INSERT INTO $this->table (title, author_id, category_id) VALUES (:title, :author_id, :category_id)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author_id', $author_id);
        $stmt->bindParam(':category_id', $category_id);

        return $stmt->execute();
    }

//metodo para obtener todos los libros
public function getBooks() {
    //consulta para obtener todos los libros
    $query = "SELECT books.*, authors.name as author_name, categories.name as category_name
              FROM $this->table
              LEFT JOIN authors ON books.author_id = authors.id
              LEFT JOIN categories ON books.category_id = categories.id";
    
    //ejecutar la consulta
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
   

    //devolver los resultados como un arreglo asociativo
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}

?>