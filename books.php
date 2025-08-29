<?php

//get the database
require_once 'database.php';

class Books
{
    private $conn;
    private $table = "tbl_books";

    //books constructor
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($title, $author_name, $genre, $pub_year)
    {
        $sql = "INSERT INTO " . $this->table . " (title, author_name, genre, pub_year) VALUES (:title, :author_name, :genre, :pub_year)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['title' => $title, 'author_name' => $author_name, 'genre' => $genre, 'pub_year' => $pub_year]);
    }

    public function readAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $author_name, $genre, $pub_year)
    {
        $sql = "UPDATE " . $this->table . " SET title = :title, author_name = :author_name, genre = :genre, pub_year = :pub_year WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id, 'title' => $title, 'author_name' => $author_name, 'genre' => $genre, 'pub_year' => $pub_year]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}