<?php
include "header.php";
?>
<div class="container">
    <div class="col-md-5">
        <div class="row">
            <h3>Agregar Pregunta</h3>
        </div>

        <form class="form-horizontal" action="addPregunta.php" method="post">
            <div class="form-group">
                <label for="pregunta">Descripción de pregunta!!!</label>
                <input type="text"
                       class="form-control"
                       id="pregunta" name="pregunta"/>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a class="btn" href="tablePreguntas.php">Regresar</a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
<?php
?>
