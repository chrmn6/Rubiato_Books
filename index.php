<?php

require_once 'books.php';
$books = new Books();
$book = $books->readAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW BOOKS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="container mt-4">

    <h2>BOOKS LIST</h2>
    <a href="create.php" class="btn btn-success mb-3">Add New Books</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author Name</th>
                <th>Genre</th>
                <th>Publication Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($book as $b): ?>
                <tr>
                    <td><?= $b['id']; ?></td>
                    <td><?= $b['title']; ?></td>
                    <td><?= $b['author_name']; ?></td>
                    <td><?= $b['genre']; ?></td>
                    <td><?= $b['pub_year']; ?></td>
                    <td>
                        <a href="update.php?id=<?= $b['id']; ?>" class="btn btn-success btn-sm">Update</a>
                        <a href="delete.php?id=<?= $b['id']; ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this book?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>