<?php
require 'database.php';
include "header.php";

$personaje = filter_input(INPUT_POST, "personaje");

$pdo = Database::connect();
try {
    $sql = "INSERT INTO personajes (personaje) values('$personaje')";
    $pdo->exec($sql);

    $personaje_id = $pdo->lastInsertId();
    $sql = "INSERT INTO personaje_pregunta (personaje_id, pregunta_id)
            SELECT $personaje_id, pregunta_id FROM preguntas";
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
?>

<div class="container">
    <div class="col-md-10">
        <div class="row">
            <h3></h3>
        </div>
        <div class="row">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Pregunta</th>
                        <th><?= $personaje; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT personaje_pregunta_id, pregunta
                            FROM personaje_pregunta
                            INNER JOIN preguntas ON
                                personaje_pregunta.pregunta_id = preguntas.pregunta_id
                            WHERE personaje_pregunta.personaje_id = $personaje_id";
                    foreach ($pdo->query($sql) as $row) {
                        $p = $row['pregunta'];
                        $id = $row['personaje_pregunta_id'];
                        echo "<tr>";
                        echo "<td>$p</td>";
                        echo "<td>
                                <select itemref='$id' class='no_si'>
                                    <option value = '0'>No</option>
                                    <option value = '1'>Si</option>
                                </select >
                              </td>";
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
Database::disconnect();
?>
