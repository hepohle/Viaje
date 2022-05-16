<?php

/* 
La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. 
De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.

Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros). 
Utilice un array que almacene la información correspondiente a los pasajeros. 
Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.

Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos. 
*/

/*
Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. 
El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. 
También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje. 
Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.
Nota: Recuerden que deben enviar el link a la resolución en su repositorio en GitHub.
*/


/* 
La empresa de transporte desea gestionar la información correspondiente a los Viajes que pueden ser: 
Terrestres o Aéreos, guardar su importe e indicar si el viaje es de ida y vuelta. 
De los viajes aéreos se conoce el número del vuelo, la categoría del asiento (primera clase o no), nombre de la aerolínea, y la cantidad de escalas del vuelo en caso de tenerlas. 
De los viajes terrestres se conoce la comodidad del asiento, si es semicama o cama.

La empresa ahora necesita implementar la venta de un pasaje, para ello debe realizar la función venderPasaje(pasajero) 
que registra la venta de un viaje al pasajero que es recibido por parámetro. 
La venta se realiza solo si hayPasajesDisponible. 
Si el viaje es terrestre y el asiento es cama, se incrementa el importe un 25%. 
Si el viaje es aéreo y el asiento es primera clase sin escalas, se incrementa un 40%, si el viaje además de ser un asiento de primera clase, el vuelo tiene escalas se incrementa el importe del viaje un 60%. 
Tanto para viajes terrestres o aéreos, si el viaje es ida y vuelta, se incrementa el importe del viaje un 50%. 
El método retorna el importe del pasaje si se pudo realizar la venta.

Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso contrario.
*/


class Viaje{
    
//ATRIBUTOS
    private $codigo;
    private $destino;
    private $cantidadMax;
    private $pasajerosDelViaje = [];
    private $objResponsable;
    private $importe;
    private $idayVuelta; //boolean

//CONSTRUCTOR
    public function __construct($codigo, $destino, $cantidadMax, $pasajerosDelViaje, $objResponsable, $importe, $idayVuelta)
    {
       $this->codigo = $codigo;
       $this->destino = $destino;
       $this->cantidadMax = $cantidadMax;
       $this->pasajerosDelViaje = $pasajerosDelViaje;
       $this->objResponsable = $objResponsable;
       $this->importe = $importe;
       $this->idayVuelta = $idayVuelta;
    }

//METODOS 
    //GETTERS SETTERS
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getDestino()
    {
        return $this->destino;
    }
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    public function getCantidadMax()
    {
        return $this->cantidadMax;
    }
    public function setCantidadMax($cantidadMax)
    {
        $this->cantidadMax = $cantidadMax;
    }
 
    public function getPasajerosDelViaje()
    {
        return $this->pasajerosDelViaje;
    }
    public function setPasajerosDelViaje($pasajerosDelViaje)
    {
        $this->pasajerosDelViaje = $pasajerosDelViaje;
    }

    public function getObjResponsable()
    {
        return $this->objResponsable;
    }

    public function setObjResponsable($objResponsable)
    {
        $this->objResponsable = $objResponsable;
    }

    public function getImporte()
    {
        return $this->importe;
    }

    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    public function getIdayVuelta()
    {
        return $this->idayVuelta;
    }

    public function setIdayVuelta($idayVuelta)
    {
        $this->idayVuelta = $idayVuelta;
    }

//__toString
    public function __toString()
    {
        if ($this->getIdayVuelta()) {
            $viajeIdaVuelta = "Si";
        }else {
            $viajeIdaVuelta = "No";
        }

        $cadena = "Código del viaje: " . $this->getCodigo() . "\n" . 
        "Destino del viaje: " . $this->getDestino() . "\n" . 
        "Cantidad máxima de pasajeros: " . $this->getCantidadMax() . "\n" .
        "Pasajeros: " . $this->getPasajerosDelViaje() . "\n" .
        "Ida y Vuelta: ". $viajeIdaVuelta . "\n" . 
        "Importe: $" . $this->getImporte() . "\n" .
        "Responsable: " . $this->getObjResponsable() . "\n";
        
        return $cadena;
    }

    //OBTIENE EL NOMBRE DE UN PASAJERO SEGUN DNI
    public function obtenerNombrePasajero($dni){
        
        $pasajeros = $this->getPasajerosDelViaje();
        $nombrePasajero = null;
        $i=0;
        while ($i < count($pasajeros) && $nombrePasajero = null) {
            $dniPasajero = $pasajeros[$i]->getNroDocumento();
            if ($dniPasajero == $dni) {
                $nombrePasajero = $pasajeros[$i]->getNombre();
            }
            $i++;
        }
        return $nombrePasajero;
    }

    //OBTIENE EL APELLIDO DE UN PASAJERO SEGUN DNI
    public function obtenerApellidoPasajero($dni){
        $pasajeros = $this->getPasajerosDelViaje();
        $apellidoPasajero = null;
        $i = 0;
        while ($i < count($pasajeros) && $apellidoPasajero = null) {
            $dniPasajero = $pasajeros[$i]->getNroDocumento();
            if ($dniPasajero == $dni) {
                $apellidoPasajero = $pasajeros[$i]->getApellido();
            }
            $i++;
        }
        return $apellidoPasajero;
    }

    public function hayLugar(){
        $respuesta = true;
        $cantidadMax = $this->getCantidadMax();
        $pasajeros = $this->getPasajerosDelViaje();
        $cantPasajeros = count($pasajeros);
        if ($cantidadMax <= $cantPasajeros) {
            $respuesta = false;
        }
        return $respuesta;
    }

    // AGREGAR UN PASAJERO
    public function agregarPasajero($nuevoPasajero){
        $pasajeros = ($this->getPasajerosDelViaje());
        $top = count($pasajeros);
        $i = 0;
        $noEncontrado = true;
        $dniNuevoPasajero = $nuevoPasajero->getNroDocumento();
        $respuesta = false;

        while ($noEncontrado && $i < $top) {
            $pasajero = $pasajeros[$i];
            $dniPasajero = $pasajero->getNroDocumento();
            if ($dniPasajero == $dniNuevoPasajero) {
                $noEncontrado == false;
            }
            $i++;
        }

        if ($noEncontrado) {
            $respuesta = true;
            $pos = count($pasajeros);
            if ($pos == 0) {
                $pasajeros[0]= $nuevoPasajero;
            }else {
                $pasajeros[$pos] = $nuevoPasajero;
            }
            $this->setPasajerosDelViaje($pasajeros);
        }else {
            $respuesta = false;
        }
        return $respuesta;
    }

    // ELIMINAR UN PASAJERO
    public function elimanrPasajero($dni){
        $pasajeros = $this->getPasajerosDelViaje();
        $i =0;
        $seEncontro = false;
        while ($i < count($pasajeros) && $seEncontro = false) {
            $dniPasajero = $pasajeros[$i]->getNroDocumento();
            if ($dniPasajero == $dni) {
                unset($pasajeros[$i]);
                $n_pasajeros = array_values($pasajeros);
                $this->setPasajerosDelViaje($n_pasajeros);
                $seEncontro = true;
            }
            $i ++;
        }
        return $seEncontro;
    } 

    // BUSCAR PASAJERO
    public function buscarPasajero($dni){
        $arrPasajeros = $this->getPasajerosDelViaje();
        $i = 0;
        $seEncontro = false;
        while ($i < count($arrPasajeros) && !$seEncontro) {
            $objPasajero = $arrPasajeros[$i];
            $seEncontro = ($objPasajero->getNroDocumento() == $dni);

            $i = $i + 1;
        }
        $posicion = ($seEncontro ? ($i-1) : -1);
        return $posicion;
    }

    public function hayPasajesDisponible($cantPasajes)
    {
        $hayLugar = false;
        $cantPasajeros = count($this->getPasajerosDelViaje());
        $totalPasajeros = $cantPasajeros + $cantPasajes;
        $cantAsientos = count($this->getCantidadMax());
        if ($totalPasajeros < $cantAsientos) {
            $hayLugar = true;
        }
        return $hayLugar;
    }

}


?>