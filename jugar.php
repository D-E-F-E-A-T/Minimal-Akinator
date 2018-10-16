<link rel="stylesheet" href="estilo.css">

<?php
//Conexion a la base de dartos
require "database.php";
include "header.php";

// Obtener la primera pregunta con randow
$pdo = Database::connect();
try {

    //Resea aceptado y aplicado, reinicia juego!!!
    $sql = "UPDATE personaje_pregunta "
            . "SET aceptado = 0, aplicado = 0 ";
    $pdo->exec($sql);
    //--------------------------------------------

    $sql = 'SELECT DISTINCT preguntas.pregunta_id,
                            preguntas.pregunta
            FROM personaje_pregunta
            inner join preguntas on
            personaje_pregunta.pregunta_id  = preguntas.pregunta_id
            WHERE (personaje_pregunta.aceptado = 0
                and personaje_pregunta.aplicado = 0)
            ORDER BY RAND() limit 1';
    $result = $pdo->query($sql);
    if ($result->rowcount() > 0) {
        while ($row = $result->fetch()) {
            $pregunta = $row['pregunta'];
            $pregunta_id = $row['pregunta_id'];
        }
    }
} catch (PDOException $e) {
    die("Error de conexion a db!!!");
}
?>
<div class="container">
    <div class="col-md-5">
        <div id="genio">
            <img src="img/akinator-adivinando.png" alt="">
        </div>
    </div>
    <br><br><br><br><br>
    <div class="col-md-5">
        <div class="panel panel-info">
            <div class="panel-heading"><?= $pregunta; ?></div>
            <div class="panel-body">
                <button class="btn btn-info btn-block btn-sino"
                        value="1"
                        type="button">Si</button>
                <button class="btn btn-info btn-block btn-sino"
                        value="0"
                        type="button">No</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".btn-sino").on("click", function () {
            var $pregunta_id = <?= $pregunta_id ?>;
            var $aceptado = $(this).val();
            $.post("updatePregunta.php",
                    {pregunta_id: $pregunta_id, aceptado: $aceptado});
            location.href="Jugando.php";
        });
    });
</script>

<br><br>
<?php
Database::disconnect();
include "footer.php";
?>
