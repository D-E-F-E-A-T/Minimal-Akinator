<?php
require 'database.php';

$id = filter_input(INPUT_POST, "id");
$valor = filter_input(INPUT_POST, "valor");

$pdo = Database::connect();
try {
    $sql = "UPDATE personaje_pregunta SET valor = '$valor' "
            . "WHERE personaje_pregunta_id = $id;";
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
Database::disconnect();



