<?php

require_once 'books.php';
$books = new Books();

$id = $_GET['id'] ?? null;
if ($id) {
    $books->delete($id);
}

header('Location: index.php');