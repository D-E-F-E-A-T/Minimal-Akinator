
<?php
include "header.php";
?>
<div class="container">
    <div class="col-md-5">
        <div class="row">
            <h3>Personajes</h3>
            <p style="float: right;">
                <a href="formPersonaje.php" class="btn btn-success">Agregar</a>
            </p>
        </div>
        <div class="row">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Personaje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'database.php';
                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM personajes ORDER BY personaje';
                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['personaje_id'] . '</td>';
                        echo '<td>' . $row['personaje'] . '</td>';
                        echo '</tr>';
                    }
                    Database::disconnect();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br><br><br><br><br>
<?php
?>
