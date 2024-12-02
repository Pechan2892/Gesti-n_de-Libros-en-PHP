<?php
class Library {
    private $book;
    private $author;
    private $category;

    public function __construct($book, $author, $category) {
        $this->book = $book;
        $this->author = $author;
        $this->category = $category;
    }

    public function addNewBook($title, $author_name, $category_name) {
        // Buscar o agregar al autor
        $authors = $this->author->getAuthors();
        $author_id = null;
        foreach ($authors as $author) {
            if ($author['name'] === $author_name) {
                $author_id = $author['id'];
                break;
            }
        }
        if (!$author_id) {
            $this->author->addAuthor($author_name);
            $authors = $this->author->getAuthors();
            foreach ($authors as $author) {
                if ($author['name'] === $author_name) {
                    $author_id = $author['id'];
                    break;
                }
            }
        }

        // Buscar o agregar la categoría
        $categories = $this->category->getCategories();
        $category_id = null;
        foreach ($categories as $category) {
            if ($category['name'] === $category_name) {
                $category_id = $category['id'];
                break;
            }
        }
        if (!$category_id) {
            $this->category->addCategory($category_name);
            $categories = $this->category->getCategories();
            foreach ($categories as $category) {
                if ($category['name'] === $category_name) {
                    $category_id = $category['id'];
                    break;
                }
            }
        }

        // Agregar el libro
        return $this->book->addBook($title, $author_id, $category_id);
    }
}
?>
