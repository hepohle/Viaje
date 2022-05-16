<?php
require_once ("Empresa.php");
require_once ("Viaje.php");
require_once ("ViajeTerrestre.php");
require_once ("ViajeAereo.php");
require_once ("Pasajero.php");
require_once ("ResponsableV.php");

//Array de muestra de los pasajeros del viaje.

$pasajero1 = new Pasajero("Juan", "Perez", 21457338, 155987654);
$pasajero2 = new Pasajero("Oscar", "García",31457558, 155321789);
$pasajero3 = new Pasajero("Rosa", "Gonzalez", 21457838, 155789654);
$pasajero4 = new Pasajero("María", "Diaz", 13457638, 1551236654);
$pasajero5 = new Pasajero("Alejandro", "Mendez", 42457438, 155456789);

// Collecciones de pasajeros
$coleccionPasajeros1 = [$pasajero1, $pasajero2, $pasajero3, $pasajero4, $pasajero5];
$coleccionPasajeros2 = [$pasajero1, $pasajero2, $pasajero3, $pasajero5];
$coleccionPasajeros3 = [$pasajero1, $pasajero3, $pasajero4, $pasajero5];

// Responsables de viajes
$objResponsable1 = new ResponsableV(1, 123, "José", "Blanco");
$objResponsable2 = new ResponsableV(2, 222, "Juan", "Mendez");
$objResponsable3 = new ResponsableV(3, 321, "Luis", "Paez");

// Creacion de un nuevo objeto Viaje de muestra
$objViaje1 = new ViajeTerrestre(125, "Bariloche", 55, $coleccionPasajeros1, $objResponsable1, 2000, true, "Cama");
$objViaje2 = new ViajeTerrestre(111, "Cordoba", 30, $coleccionPasajeros2, $objResponsable2, 3500, false, "Semicama");
$objViaje3 = new ViajeAereo(333, "Buenos Aires", 40, $coleccionPasajeros3, $objResponsable3, 15000, true, 12345, "Primera Clase", 2);


// Coleccion de viajes
$coleccionViajes = [$objViaje1, $objViaje2, $objViaje3];

// Array con los pasajeros del viaje.
$listaPasajeros = $objViaje1->getPasajerosDelViaje();

// Creacion objeto Empres
$objEmpresa = new Empresa("Viaje Feliz");

// SET Coleccion de Viajes
$objEmpresa->setColeccionViajes($coleccionViajes);

// FUNCION CREAR NUEVO VIAJE
function nuevoViaje($arr){
    echo "Ingrese el código del viaje: \n";
    $n_codigo = trim(fgets(STDIN));
    echo "Ingrese el destino: \n";
    $n_destino = trim(fgets(STDIN));
    echo "Ingrese cantidad máxima de pasajeros: \n";
    $n_cantMax = trim(fgets(STDIN));
    echo "Ingrese monto: \n";
    $viajeMonto = trim(fgets(STDIN));
    echo "Ida y vuelta: \n";
    $idaVuelta = ida_Vuelta();
    echo "Tipo de viaje: (aereo / terrestre)\n";
    $tipoViaje = trim(fgets(STDIN));
    echo "Ingrese el responsable del viaje: \n";
    $objResponsable = ingresarResponsable();
    

    $n_pasajeros = $arr;
    
    if ($tipoViaje == "aereo") {
        echo "Nº de vuelo: \n";
        $nro_vuelo = trim(fgets(STDIN));
        echo "Categoria: \n";
        $catVuelo = trim(fgets(STDIN));
        echo "Escalas: \n";
        $escalasVuelo = trim(fgets(STDIN));
        
        $n_viaje = new ViajeAereo($n_codigo, $n_destino, $n_cantMax, $n_pasajeros, $objResponsable, $viajeMonto, $idaVuelta, $nro_vuelo, $catVuelo, $escalasVuelo);
    }elseif ($tipoViaje == "terrestre") {
       echo "Tipo de asiento: (Cama / Semi-cama)\n";
       $tipoAsiento = trim(fgets(STDIN));
       $n_viaje = new ViajeTerrestre($n_codigo, $n_destino, $n_cantMax, $n_pasajeros, $objResponsable, $viajeMonto, $idaVuelta, $tipoAsiento); 
    }
    return $n_viaje;
};

/**
 * Pide si el viaje es ida y vuelta
 * Retorna un boolean
 */
function ida_Vuelta(){
    echo "si / no \n";
    $respuesta = strtoupper(trim(fgets(STDIN)));
    if ($respuesta == "SI") {
        $ida_y_vuelta = true;
    }else {
        $ida_y_vuelta = false;
    }
    return $ida_y_vuelta;
}

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
    echo "Ingrese los datos del nuevo pasajero: \n";
    echo "Nombre: \n";
    $nombre = trim(fgets(STDIN));
    echo "Apellido: \n";
    $apellido = trim(fgets(STDIN));
    echo "Nº documento: \n";
    $dni = trim(fgets(STDIN));
    echo "Teléfono: \n";
    $tel = trim(fgets(STDIN));
    $nuevoPasajero = new Pasajero($nombre, $apellido, $dni, $tel);
    return $nuevoPasajero;
}

/**
 * Recibe el array con los pasajeros y los imprime en pantalla.
 */
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

    if ($viaje->getIdayVuelta()) {
        $viajeIdaVuelta = "Si";
    }else {
        $viajeIdaVuelta = "No";
    }

    echo "Código de viaje:  {$viaje->getCodigo()} \n";
    echo "Destino de viaje: {$viaje->getDestino()}.\n";
    echo "Cantidad máxima de pasajeros: {$viaje->getCantidadMax()}.\n";
    echo "Ida y Vuelta: " . $viajeIdaVuelta . "\n";
    echo "Importe: $" . $viaje->getImporte() . "\n";
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
                $viaje->setCodigo($nuevoCodigo);
                echo "--- El código ha sido modificado con éxito! ---\n";
                
                break;
            case 2: // Modificar el destino.
                echo "----- Ingrese el nuevo destino -----\n";
                $nuevoDestino = trim(fgets(STDIN));
                while ($nuevoDestino == $viaje->getDestino()) {
                    echo "Debe ingresar un destino diferente! Pruebe de nuevo: \n";
                    $nuevoDestino = trim(fgets(STDIN));
                }
                $viaje->setDestino($nuevoDestino);
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
                $viaje->setCantidadMax($nuevaCantMax);    
                echo "--- La cantidad máxima de pasajero ha sido modificada con éxito! ---\n";
                
                break;
            case 4: // Agregar un pasajero.
                echo "----- Ingrese un nuevo pasajero ------\n";
                $nPasajero = $viaje->ingresarPasajeros();
                $dni_nPasajero = $nPasajero->getNroDocumento();
                $condition = $viaje->buscarPasajero($dni_nPasajero);
                if ($condition == -1) {
                    $viaje->agregarPasajero($nPasajero);    
                }else {
                    echo "Ese pasajero ya está en el viaje\n";
                }
                
            }
    } while ($opcion <> 4);
}


/**
 * Menu modificar pasajero
 */
function  menuModificarPasajero(){
    echo "[1] Cambiar nombre. \n";
    echo "[2] Cambiar apellido. \n";
    echo "[3] Cambiar Teléfono. \n";
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
                $posicion = $objViaje->buscarPasajero($dni);
                if ($posicion <> -1) {
                    echo "Ingrese el nombre: \n";
                    $newNombre = trim(fgets(STDIN));   
                    $pasajeros[$posicion]->setNombre($newNombre);
                    $arr = $objViaje->getPasajerosDelViaje();
                    $pasMod = $arr[$posicion];
                    echo $pasMod . "\n";
                    echo "Datos modificados con éxito\n";
                }
                
                break;
            case 2:
                $pasajeros = $objViaje->getPasajerosDelViaje();
                mostrarPasajeros($pasajeros);
                echo "Ingrese el dni del pasajero que quiere modificar: \n";
                $dni = trim(fgets(STDIN));
                $posicion = $objViaje->buscarPasajero($dni);
                if ($posicion <> -1) {
                    echo "Ïngrese el apellido: \n";
                    $newApellido = trim(fgets(STDIN));
                    $pasajeros[$posicion]->setApellido($newApellido);
                    $arr = $objViaje->getPasajerosDelViaje();
                    $pasMod = $arr[$posicion];
                    echo $pasMod . "\n";
                    echo "Datos modificados con éxito\n";
                }
                break;
            case 3:
                $pasajeros = $objViaje->getPasajerosDelViaje();
                mostrarPasajeros($pasajeros);
                echo "Ingrese el dni del pasajero que quiere modificar: \n";
                $dni = trim(fgets(STDIN));
                $posicion = $objViaje->buscarPasajero($dni);
                if ($posicion <> -1) {
                    echo "Ingrese el teléfono: \n";
                    $newTel = trim(fgets(STDIN));
                    $pasajeros[$posicion]->setTelefono($newTel);
                    $arr = $objViaje->getPasajerosDelViaje();
                    $pasMod = $arr[$posicion];
                    echo $pasMod . "\n";
                    echo "Datos modificados con éxito\n";
                }
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
    echo "[8] Veder Viaje.\n";
    echo "[9] Salir \n";

    do {
        echo "Elija una opción ";
        $opcion = trim(fgets(STDIN));
    } while ($opcion < 1 || $opcion > 9);
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
            $nPasajero = ingresarPasajeros();
            $dni_nPasajero = $nPasajero->getNroDocumento();
            $condition = $objViaje->buscarPasajero($dni_nPasajero);
            if ($condition == -1) {
                $objViaje->agregarPasajero($nPasajero);    
            }else {
                echo "Ese pasajero ya está en el viaje\n";
            }
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
        case 8: /// VENDER VIAJE
            echo "----- Vender viaje a: -----\n
            {$pasajero1->__toString()}";
            $importe = $objEmpresa->venderPasaje($pasajero1);
            if ($importe != null) {
                echo "\nEl importe es $ {$importe}.\n";
            }else {
                echo "No se pude realizar la venta del viaje.\n";
            }
            break;
    }
} while ($opcion <> 9); /// SALIR DEL PROGRAMA

?>