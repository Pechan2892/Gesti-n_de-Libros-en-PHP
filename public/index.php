<?php
//incluir archivos
require_once '../config/database.php';
require_once '../classes/Book.php';
require_once '../classes/Category.php';
require_once '../classes/Author.php';
require_once '../classes/Library.php';

//inicializar la base de datos
$database = new Database();
$db = $database->connect();

//inicializar las clases
$book = new Book($db);
$category = new Category($db);
$author = new Author($db);
$library = new Library($book, $author, $category);

//agregar libros
$library->addNewBook("20.000 Leagues Under the Sea", "Don Quijote de la Mancha", "Viaje al centro de la Tierra", "Fantasia", "available");


//obtener libros
$books = $book->getBooks();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bibliotech</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Lista de Libros</h1>
    <ul>
        <?php foreach ($books as $b): ?>
            <li><?= $b['title'] ?> por <?= $b['author_name'] ?> (<?= $b['category_name'] ?>)</li>
        <?php endforeach; ?>
    </ul>
</body>
</html>