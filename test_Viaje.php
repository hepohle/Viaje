<?php

include "Viaje.php";
include "Pasajero.php";
include  "ResponsableV.php";

//Array de muestra de los pasajeros del viaje.

$pasajero1 = new Pasajero("Juan", "Perez", 21457338, 155987654);
$pasajero2 = new Pasajero("Oscar", "García",31457558, 155321789);
$pasajero3 = new Pasajero("Rosa", "Gonzalez", 21457838, 155789654);
$pasajero4 = new Pasajero("María", "Diaz", 13457638, 1551236654);
$pasajero5 = new Pasajero("Alejandro", "Mendez", 42457438, 155456789);

$coleccionPasajeros = [$pasajero1, $pasajero2, $pasajero3, $pasajero4, $pasajero5];

$objResponsable = new ResponsableV(1, 123, "José", "Blanco");

// Creacion de un nuevo objeto Viaje de muestra
$objViaje = new Viaje(125, "Bariloche", 55, $coleccionPasajeros, $objResponsable);

// Array con los pasajeros del viaje.
$listaPasajeros = $objViaje->getPasajerosDelViaje();

// FUNCION CREAR NUEVO VIAJE
function nuevoViaje($arr){
    echo "Ingrese el código del viaje: \n";
    $n_codigo = trim(fgets(STDIN));
    echo "Ingrese el destino: \n";
    $n_destino = trim(fgets(STDIN));
    echo "Ingrese cantidad máxima de pasajeros: \n";
    $n_cantMax = trim(fgets(STDIN));
    echo "Ingrese el responsable del viaje: \n";
    $objResponsable = ingresarResponsable();
    $n_pasajeros = $arr;
    $n_viaje = new Viaje($n_codigo, $n_destino, $n_cantMax, $n_pasajeros, $objResponsable);
    return $n_viaje;
};

/**
 * Pide los datos del responsable del viaje y crea el objeto Responsable.
 */
function ingresarResponsable(){
    echo "Nº de empleado: \n";
    $n_empleado = trim(fgets(STDIN));
    echo "Nº de licencia: \n";
    $n_licencia = trim(fgets(STDIN));
    echo "Nombre: \n";
    $nombreResponsable = trim(fgets(STDIN));
    echo "Apellido: \n";
    $apellidoResponsable = trim(fgets(STDIN));
    $responsableViaje = new ResponsableV($n_empleado, $n_licencia, $nombreResponsable, $apellidoResponsable);

    return $responsableViaje;
}

/**
 * Pide los datos de los pasajeros para formar la colección.
 */
function ingresarPasajeros(){

}

/**
 * Recibe un array con todos los pasajeros del viaje y los muestra por pantalla.
 */
// function mostrarPasajeros($arr){
//     $i = 1;
//     foreach ($arr as $valor) {
//         echo "[{$i}] PASAJERO \n";
//         $i = $i +1;
//         foreach ($valor as $key => $value) { 
//             echo $key . " : " . $value . "\n";
//         }
//         echo "-----*-----\n";
//     }   
// }

function mostrarPasajeros($arr){
    $i = 1;
    foreach ($arr as $key => $value) {
        $pasajero = $value;
        echo "Pasajero {$i}:\n";
        echo $pasajero;
        $i++;
    }
}


/**
 * Recibe un objeto Viaje y muestra por pantalla todos los datos del viaje
 */
function mostrarViaje($viaje){
    echo "Código de viaje:  {$viaje->getCodigo()} \n";
    echo "Destino de viaje: {$viaje->getDestino()}.\n";
    echo "Cantidad máxima de pasajeros: {$viaje->getCantidadMax()}.\n";
    echo "Responsable del viaje: {$viaje->getObjResponsable()}\n";
    echo "-----*-----\n";
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
            case 1: // Modificar el código.
                echo "----- Ingrese el nuevo código -----\n";
                $nuevoCodigo = trim(fgets(STDIN));
                while ($nuevoCodigo == ($viaje->getCodigo())) {
                    echo "Debe ingresar un código diferente! Pruebe de nuevo: \n";
                    $nuevoCodigo = trim(fgets(STDIN));
                }
                $viaje->modificarCodigo($viaje, $nuevoCodigo);
                echo "--- El código ha sido modificado con éxito! ---\n";
                
                break;
            case 2: // Modificar el destino.
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
            case 3: // Modificar cantidad máxima de pasajeros.
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
 * Agregar un pasajero
 */
function ingresarPasajero(){
    echo "Ingrese el nombre del pasajero: \n";
    $n_Nombre = trim(fgets(STDIN));
    echo "Ingrese el apellido del pasajero: \n";
    $n_Apellido = trim(fgets(STDIN));
    echo "Ingrese el dni del pasajero: \n";
    $n_Dni = trim(fgets(STDIN));
    $nuevoPasajero = ["nombre" => $n_Nombre, "apellido" => $n_Apellido, "dni" => $n_Dni];
    return $nuevoPasajero;
}

/**
 * Menu modificar pasajero
 */
function  menuModificarPasajero(){
    echo "[1] Cambiar nombre. \n";
    echo "[2] Cambiar apellido. \n";
    echo "[3] Cambiar DNI. \n";
    echo "[4] Volver al menu anterior. \n";
    do {
        echo "Elija una opción: \n";
        $opcion = trim(fgets(STDIN));
    } while ($opcion < 1 || $opcion > 4);
    return $opcion;
}

/**
 * Modificar pasajero
 */
function modificarPasajero($objViaje){
    do {
        $opcion = menuModificarPasajero();
        switch ($opcion) {
            case 1:
                $pasajeros = $objViaje->getPasajerosDelViaje();
                mostrarPasajeros($pasajeros);
                echo "Ingrese el dni del pasajero que quiere modificar: \n";
                $dni = trim(fgets(STDIN));
                echo "Ingrese el nombre: \n";
                $newNombre = trim(fgets(STDIN));
                $objViaje->modificarPasajeroNombre($dni, $newNombre);
                $arr = $objViaje->getPasajerosDelViaje();
                mostrarPasajeros($arr);
                break;
            case 2:
                echo "Ingrese el dni del pasajero que quiere modificar: \n";
                $dni = trim(fgets(STDIN));
                echo "Ïngrese el apellido: \n";
                $newApellido = trim(fgets(STDIN));
                $objViaje->modificarPasajeroApellido($dni, $newApellido);
                $arr = $objViaje->getPasajerosDelViaje();
                $arr = $objViaje->getPasajerosDelViaje();
                mostrarPasajeros($arr);
                break;
            case 3:
                echo "Ingrese el dni del pasajero que quiere modificar: \n";
                $dni = trim(fgets(STDIN));
                echo "Ingrese el dni: \n";
                $newDni = trim(fgets(STDIN));
                $objViaje->modificarPasajeroDni($dni, $newDni);
                $arr = $objViaje->getPasajerosDelViaje();
                $arr = $objViaje->getPasajerosDelViaje();
                mostrarPasajeros($arr);
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
    echo "[7] Mostrar pasajeros.\n";
    echo "[8] Salir \n";

    do {
        echo "Elija una opción ";
        $opcion = trim(fgets(STDIN));
    } while ($opcion < 1 || $opcion > 8);
    return $opcion;
}

do {
    $opcion = menu();
    switch ($opcion) {
        case 1: /// INGRESAR NUEVO VIAJE
            echo "----- Ingrese un nuevo viaje -----\n";
                $viaje = nuevoViaje($coleccionPasajeros);
            break;
        case 2: /// MODIFICAR VIAJE
            echo "----- Modificar un viaje -----\n";
                modificarViaje($objViaje);
            break;
        case 3: /// AGREGAR PASAJERO
            echo "----- Agregar un pasajero -----\n";
            $nuevoPasajero = ingresarPasajero();
            $objViaje->agregarPasajero($nuevoPasajero);
            break;
        case 4: /// ELIMINAR PASAJERO
            echo "----- Eliminar un pasajero -----\n";
            echo "Ingrese el nº del pasajero que quiere eliminar: \n";
            $indicePasajero = trim(fgets(STDIN));
            $objViaje->elimanrPasajero($indicePasajero);
            $arr = $objViaje->getPasajerosDelViaje();
            mostrarPasajeros($arr);
            break;
        case 5: /// MODIFICAR PASAJERO
            echo "----- Modificar un pasajero -----\n";
            /* echo "Ingrese el nº del pasajero que quiere modificar: \n";
            $indicePasajero = trim(fgets(STDIN)); */
            $arr = $objViaje->getPasajerosDelViaje();
            //modificarPasajero($arr, $indicePasajero, $newNombre);
            modificarPasajero($objViaje);
            mostrarPasajeros($arr);
            break;
        case 6: /// MOSTRAR VIAJE
            echo "----- Mostrar un viaje -----\n";
                mostrarViaje($objViaje);
            break;
        case 7: /// MOSTRAR PASAJEROS
            echo "----- Mostrar pasajeros -----\n";
            $arr = $objViaje->getPasajerosDelViaje();    
            mostrarPasajeros($arr);
            break;
    }
} while ($opcion <> 8); /// SALIR DEL PROGRAMA

?>