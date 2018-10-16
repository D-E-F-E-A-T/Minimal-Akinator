<?php
include "header.php";
?>
<div class="container">
    <div class="col-md-5">
        <div class="row">
            <h3>Agregar Personaje</h3>
        </div>

        <form class="form-horizontal"
              action="addPersonaje.php" method="post">
            <div class="form-group">
                <label for="personaje">Nombre de Personaje</label>
                <input type="text"
                       class="form-control"
                       id="personaje" name="personaje"
                       autocomplete="off">
            </div>
            <div class="form-actions">
                <button type="submit"
                        class="btn btn-success">Guardar
                </button>
                <a class="btn" href="tablePersonajes.php">
                    Regresar
                </a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
<?php
?>
