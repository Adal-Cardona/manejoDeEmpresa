<?php
    $host = "localhost";
    $db = "uvne";
    $user = "root";
    $pwd = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
    } catch (Exception $ex) {
        echo  $ex ->getMessage();
    }

?>