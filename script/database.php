<?php

try {
    $dbConnection = new PDO('mysql:host=localhost;dbname=webtools', 'root', '');
} catch (PDOException $exception) {
    die('The Database Connection failed!');
}