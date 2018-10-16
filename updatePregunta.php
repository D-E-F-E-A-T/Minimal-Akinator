<?php
require 'database.php';

$pregunta_id = filter_input(INPUT_POST, "pregunta_id");
$aceptado = filter_input(INPUT_POST, "aceptado");

$pdo = Database::connect();
try {
    
    $sql = "UPDATE personaje_pregunta "
            . "SET aceptado = $aceptado, aplicado = 1 "
            . "WHERE pregunta_id = $pregunta_id;";
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . 
            $e->getMessage());
}
Database::disconnect();



