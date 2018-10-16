<link rel="stylesheet" href="estilo.css">
<?php
require "database.php";
include "header.php";

$pdo = Database::connect();

try {
    $sql = 'SELECT personajes.personaje,
             personajes.img
            FROM personaje_pregunta
            inner join personajes on
            personaje_pregunta.personaje_id  = personajes.personaje_id
            WHERE (personaje_pregunta.aceptado = 1
                    and personaje_pregunta.aplicado = 1
                        and personaje_pregunta.valor = 1)
            GROUP by personajes.personaje';
    $result = $pdo->query($sql);
    if ($result->rowcount() == 1) {
        $row = $result->fetch();
        $personaje = $row['personaje'];
        $img = $row['img'];
        ?>
        <div class="container">
            <div class="col-md-5">
                <div id="genio">
                    <img src="img/akinator-index.png" alt="">
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-info">
                    <div class="panel-heading">El personaje es: <?= $personaje; ?></div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-body">
                        <center> <img style="max-width: 100%; height: auto; width: auto/9;"
                             src="img/<?= $img; ?>" alt=""> </center>
                    </div>
                </div>
            </div>
        </div>
        <?php
        exit();
    }
} catch (PDOException $e) {
    die("Error de conexion a db!!!");
}

try {
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
            <img src="img/akinator-index.png" alt="">
        </div>
    </div>
    <br><br><br>
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
            location.href = "Jugando.php";
        });
    });
</script>
<br><br>

<?php
Database::disconnect();
include "footer.php";
?>
