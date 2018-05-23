<?php

class Book
{

    public function __construct () {

        $host = '127.0.0.1';
        $db   = 'book_catalog';
        $user = 'hillel';
        $pass = 'hillel_homeworks';
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->pdo = new PDO($dsn, $user, $pass, $opt);
    }

    public function saveBook($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO books (title, author, isbn) VALUES (?, ?, ?)');
        $stmt->execute(array($data['title'], $data['author'], $data['isbn']));

    }

    public function getAllBooks()
    {

        $stmt = $this->pdo->query('SELECT * FROM books');

        return $stmt->fetchAll();

    }
}