<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inteligencia Artificial</title>
        <link rel="stylesheet" href="bs/bootstrap.min.css">
        <script src="bs/navbar.css"></script>
        <script src="bs/jquery.min.js"></script>
        <script src="bs/bootstrap.min.js"></script>
        <script>
            $(document).ready(function () {
                $(".no_si").change(function () {
                    //alert($(this).attr( "itemref" ) + "-" + $(this).val());
                    var $id = $(this).attr("itemref");
                    var $valor = $(this).val();
                    $.post( "updateNoSi.php",
                    { id: $id, valor: $valor});
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <!-- Static navbar -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">Sistema Experto</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.php">Inicio</a></li>
                            <li><a href="jugar.php">Jugar</a></li>
                            <li><a href="tablePersonajes.php">Personajes</a></li>
                            <li><a href="tablePreguntas.php">Preguntas</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>
        </div> <!-- /container -->
