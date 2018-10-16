<?php

require 'database.php';

$personaje_id = filter_input(INPUT_GET, "personaje_id");
echo $personaje_id;