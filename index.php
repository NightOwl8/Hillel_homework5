<?php

require_once __DIR__ . '/book.php';

$book = new Book();

if (isset($_POST['save'])) {
    $bookData = [
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'isbn' => $_POST['isbn']
    ];
    $book->saveBook($bookData);
} 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>Book catalog</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Book Catalog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>

    <div class="container">
        <form action="index.php" enctype="multipart/form-data" method="POST">
            <div class="form-group">
              <label for="title">Название книги:</label>
              <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Название книги" name="title">
            </div>
            <div class="form-group">
              <label for="author">Автор:</label>
              <input type="text" class="form-control" id="author" placeholder="Автор"  name="author">
            </div>
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" class="form-control" id="isbn" placeholder="ISBN" name="isbn">
              </div>
            <button type="submit" class="btn btn-primary" name="save">Сохранить</button>
          </form>

          <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Автор</th>
                <th scope="col">ISBN</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $books = $book->getAllBooks();
                ?>
                <?php if (!empty($books)):?>
                <?php 
                        foreach ($books as $book):?>
                        <tr>
                            <th scope="row"><?= $book['id'];?></th>
                            <td><?= $book['title'];?></td>
                            <td><?= $book['author'];?></td>
                            <td><?= $book['isbn'];?></td>
                        </tr>
                <?php endforeach;?>
                <?php endif;?>
               
            </tbody>
            </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>