<?php
//Conexion a la base de dartos
require 'database.php';
include "header.php";

//Recibe la descripcion de la pregunta
$pregunta = filter_input(INPUT_POST, "pregunta");

//Objeto de conexion base de datos
$pdo = Database::connect();
try {
    //Consulta de insetar pregunta
    $sql = "INSERT INTO preguntas "
            . "(pregunta) values('$pregunta')";
    $pdo->exec($sql);

    //Extrae el ultimo registro
    $pregunta_id = $pdo->lastInsertId();
    $sql = "INSERT INTO personaje_pregunta (personaje_id, pregunta_id)
            SELECT personaje_id, $pregunta_id FROM personajes";
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
//
//Database::disconnect();
//header("Location: tablePreguntas.php");
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
                        <th>Personaje</th>
                        <th><?= $pregunta; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT personaje_pregunta_id, personaje
                            FROM personaje_pregunta
                            INNER JOIN personajes ON
                                personaje_pregunta.personaje_id = personajes.personaje_id
                            WHERE personaje_pregunta.pregunta_id = $pregunta_id";
                    foreach ($pdo->query($sql) as $row) {
                        $p = $row['personaje'];
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
