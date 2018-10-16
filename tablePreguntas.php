
<?php
include "header.php";
?>
<div class="container">
    <div class="col-md-5">
        <div class="row">
            <h3>Preguntas</h3>
            <p style="float: right;">
                <a href="formPregunta.php" class="btn btn-success">Agregar</a>
            </p>
        </div>
        <div class="row">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Pregunta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'database.php';
                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM preguntas ORDER BY pregunta';
                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['pregunta_id'] . '</td>';
                        echo '<td>' . $row['pregunta'] . '</td>';
                        echo '</tr>';
                    }
                    Database::disconnect();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
?>
