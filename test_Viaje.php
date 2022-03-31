<?php

include "Viaje.php";

$v_pasajeros = array(
    0 => ["nombre" => "Juan", "apellido" => "Perez", "dni" => 11457338],
    1 => ["nombre" => "Oscar", "apellido" => "García", "dni" => 31457558],
    2 => ["nombre" => "Rosa", "apellido" => "Gonzalez", "dni" => 21457838],
    3 => ["nombre" => "María", "apellido" => "Diaz", "dni" => 13457638],
    4 => ["nombre" => "Alejandro", "apellido" => "Mendez", "dni" => 12457438],
);

$objViaje = new Viaje(125, "Bariloche", 55, $v_pasajeros);

?>