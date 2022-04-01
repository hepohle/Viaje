<?php

include "Viaje.php";

//Array de muestra de los pasajeros del viaje.
$v_pasajeros = array(
    0 => ["nombre" => "Juan", "apellido" => "Perez", "dni" => 21457338],
    1 => ["nombre" => "Oscar", "apellido" => "García", "dni" => 31457558],
    2 => ["nombre" => "Rosa", "apellido" => "Gonzalez", "dni" => 21457838],
    3 => ["nombre" => "María", "apellido" => "Diaz", "dni" => 13457638],
    4 => ["nombre" => "Alejandro", "apellido" => "Mendez", "dni" => 42457438],
);

//Creacion de un nuevo objeto Viaje de muestra
$objViaje = new Viaje(125, "Bariloche", 55, $v_pasajeros);

//FUNCION CREAR NUEVO VIAJE
function nuevoViaje($arr){
    echo "Ingrese el código del viaje: \n";
    $n_codigo = trim(fgets(STDIN));
    echo "Ingrese el destino: \n";
    $n_destino = trim(fgets(STDIN));
    echo "Ingrese cantidad máxima de pasajeros: \n";
    $n_cantMax = trim(fgets(STDIN));
    $n_pasajeros = $arr;
    $n_viaje = new Viaje($n_codigo, $n_destino, $n_cantMax, $n_pasajeros);
    return $n_viaje;
};

/**
 * Recibe un array con todos los pasajeros del viaje y los muestra por pantalla.
 */
function mostrarPasajeros($arr){
    $i = 1;
    foreach ($arr as $valor) {
        echo "----- PASAJERO " . $i . " -----\n";
        $i = $i +1;
        foreach ($valor as $key => $value) { 
            echo $key . " : " . $value . "\n";
        }
        echo "-----   *****   -----\n";
    }
}

/**
 * Recibe un objeto Viaje y muestra por pantalla todos los datos del viaje
 */
function mostrarViaje($viaje){
    echo "Código de viaje: " . $viaje->getCodigo() ."\n";
    echo "Destino de viaje: {$viaje->getDestino()}.\n";
    echo "Cantidad máxima de pasajeros: {$viaje->getCantidadMax()}.\n";
    echo "Pasajeros: \n";
    mostrarPasajeros($viaje->getPasajerosDelViaje());
    //echo "-----   *****   -----\n";
}

/**
 * Muestra el muenu al usuario para poder interactuar con los datos.
 */
function menu(){
    echo "[1] Ingresar un viaje. \n";
    echo "[2] Modificar un viaje. \n";
    echo "[3] Agregar pasajero.\n";
    echo "[4] Eliminar un pasajero.\n";
    echo "[5] Modificar un pasajero.\n";
    echo "[6] Mostrar un viaje.\n";
    echo "[7] Salir \n";

    do {
        echo "Elija una opción ";
        $opcion = trim(fgets(STDIN));
    } while ($opcion < 1 || $opcion > 7);
    return $opcion;
}

do {
    $opcion = menu();
    switch ($opcion) {
        case 1:
            echo "----- Ingrese un nuevo viaje -----\n";
                $viaje = nuevoViaje($v_pasajeros);
            break;
        case 2:
            echo "----- Modificar un viaje -----\n";

            break;
        case 3:
            echo "----- Agregar un pasajero -----\n";

            break;
        case 4:
            echo "----- Eliminar un pasajero -----\n";

            break;
        case 5:
            echo "----- Modificar un pasajero -----\n";

            break;
        case 6:
            echo "----- Mostrar un viaje -----\n";
                mostrarViaje($objViaje);
            break;
    }
} while ($opcion <> 7);



?>