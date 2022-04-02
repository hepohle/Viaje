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
    echo "Código de viaje:  {$viaje->getCodigo()} \n";
    echo "Destino de viaje: {$viaje->getDestino()}.\n";
    echo "Cantidad máxima de pasajeros: {$viaje->getCantidadMax()}.\n";
    echo "Pasajeros: \n";
    mostrarPasajeros($viaje->getPasajerosDelViaje());
}

/**
 * Menu modificar Viaje
 */
function menuModificarViaje(){
    echo "[1] Modificar el código. \n";
    echo "[2] Modificar el destino. \n";
    echo "[3] Modificar cantidad máxima de pasajeros. \n";
    echo "[4] Volver al menú principal. \n";
    do {
        echo "Elija una opción: ";
        $opcion = trim(fgets(STDIN));
    } while ($opcion < 1 || $opcion > 4);
    return $opcion;
}

/**
 * Modificar un viaje
 */
function modificarViaje($viaje){
    do {
        $opcion = menuModificarViaje();
        switch ($opcion) {
            case 1: //Modificar el código.
                echo "----- Ingrese el nuevo código -----\n";
                $nuevoCodigo = trim(fgets(STDIN));
                while ($nuevoCodigo == ($viaje->getCodigo())) {
                    echo "Debe ingresar un código diferente! Pruebe de nuevo: \n";
                    $nuevoCodigo = trim(fgets(STDIN));
                }
                $viaje->modificarCodigo($viaje, $nuevoCodigo);
                echo "--- El código ha sido modificado con éxito! ---\n";
                
                break;
            case 2: //modificar el destino.
                echo "----- Ingrese el nuevo destino -----\n";
                $nuevoDestino = trim(fgets(STDIN));
                while ($nuevoDestino == $viaje->getDestino()) {
                    echo "Debe ingresar un destino diferente! Pruebe de nuevo: \n";
                    $nuevoDestino = trim(fgets(STDIN));
                }
                $viaje->modificarDestino($viaje, $nuevoDestino);
                echo "--- El destino ha sido modificado con éxito! ---\n";
                mostrarViaje($viaje); 
                break;
            case 3: //Modificar cantidad máxima de pasajeros.
                echo "----- Ingrese la nueva cantidad máxima de pasajeros -----\n";
                
                $nuevaCantMax = trim(fgets(STDIN));
                while ($nuevaCantMax <= ($viaje->getCantidadMax())){
                    echo "La nueva cantida máxima debe ser mayor a la anterior! Pruebe de nuevo: \n";
                    $nuevaCantMax = trim(fgets(STDIN));
                }
                $viaje->modificarCantidadMax($viaje, $nuevaCantMax);    
                echo "--- La cantidad máxima de pasajero ha sido modificada con éxito! ---\n";
                
                break;
            }
    } while ($opcion <> 4);
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
                modificarViaje($objViaje);
            break;
        case 3:
            echo "----- Agregar un pasajero -----\n";
            echo "Ingrese el nombre del pasajero: \n";
            $n_Nombre = trim(fgets(STDIN));
            echo "Ingrese el apellido del pasajero: \n";
            $n_Apellido = trim(fgets(STDIN));
            echo "Ingrese el dni del pasajero: \n";
            $n_Dni = trim(fgets(STDIN));
            $nuevoPasajero = ["nombre" => $n_Nombre, "apellido" => $n_Apellido, "dni" => $n_Dni];
            $objViaje->agregarPasajero($nuevoPasajero);
            mostrarViaje($objViaje);
            //print_r($nuevoPasajero);
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