<?php

require 'database.php';

$pdo = Database::connect();
try {
    $sql1 = "TRUNCATE personaje_pregunta";
    $sql2 = "TRUNCATE personajes";
    $sql3 = "TRUNCATE preguntas";
    $pdo->exec($sql1);
    $pdo->exec($sql2);
    $pdo->exec($sql3);
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql1. " . $e->getMessage());
}
Database::disconnect();
header("Location: index.php");



