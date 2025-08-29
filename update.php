<?php

require_once 'books.php';
$books = new Books();

$id = $_GET['id'] ?? null;
$data = $books->getById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author_name = $_POST['author_name'];
    $genre = $_POST['genre'];
    $pub_year = $_POST['pub_year'];

    if ($books->update($id, $title, $author_name, $genre, $pub_year)) {
        echo "Books updated successfully.";
        header("Location: index.php");
    } else {
        echo "Failed to update book.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE BOOKS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="container mt-4">

    <h2>UPDATE BOOKS</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" value="<?= $data['title']; ?>" name="title" required>
        </div>
        <div class="mb-3">
            <label for="author_name" class="form-label">Author Name</label>
            <input type="text" class="form-control" id="author_name" value="<?= $data['author_name']; ?>"
                name="author_name" required>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre" value="<?= $data['genre']; ?>" name="genre" required>
        </div>
        <div class="mb-3">
            <label for="pub_year" class="form-label">Publication Year</label>
            <input type="number" class="form-control" id="pub_year" value="<?= $data['pub_year']; ?>" name="pub_year"
                required>
        </div>
        <button type="submit" class="btn btn-success">Update Book</button>
        <a href="index.php" class="btn btn-secondary">Back to List</a>
    </form>
</body>

</html>