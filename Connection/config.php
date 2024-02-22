<?php

$dbhost = "localhost";
$dbname = "chatsystem";
$dbuser = "root";
$dbpass = "";

$server = "mysql:dbhost=".$dbhost.";dbname=".$dbname."";

try {
    $pdo = new PDO($server, $dbuser, $dbpass);
} catch (PDOException $e) {
    echo $e->getMessage();
}

