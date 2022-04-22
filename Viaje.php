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

class Viaje{
    
//ATRIBUTOS
    private $codigo;
    private $destino;
    private $cantidadMax;
    private $pasajerosDelViaje = [];
    private $objResponsable;

//CONSTRUCTOR
    public function __construct($codigo, $destino, $cantidadMax, $pasajerosDelViaje, $objResponsable)
    {
       $this->codigo = $codigo;
       $this->destino = $destino;
       $this->cantidadMax = $cantidadMax;
       $this->pasajerosDelViaje = $pasajerosDelViaje;
       $this->objResponsable = $objResponsable;
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
        return $this;
    }

    public function getDestino()
    {
        return $this->destino;
    }
    public function setDestino($destino)
    {
        $this->destino = $destino;
        return $this;
    }

    public function getCantidadMax()
    {
        return $this->cantidadMax;
    }
    public function setCantidadMax($cantidadMax)
    {
        $this->cantidadMax = $cantidadMax;
        return $this;
    }
 
    public function getPasajerosDelViaje()
    {
        return $this->pasajerosDelViaje;
    }
    public function setPasajerosDelViaje($pasajerosDelViaje)
    {
        $this->pasajerosDelViaje = $pasajerosDelViaje;
        return $this;
    }

    public function getObjResponsable()
    {
        return $this->objResponsable;
    }

    public function setObjResponsable($objResponsable)
    {
        $this->objResponsable = $objResponsable;
        return $this;
    }

//__toString
    public function __toString()
    {
        $cadena = "
        Código del viaje: {$this->getCodigo()}\n
        Destino del viaje: {$this->getDestino()}\n
        Cantidad máxima de pasajeros: {$this->getCantidadMax()}\n
        Pasajeros: {$this->getPasajerosDelViaje()}\n
        Responsable: {$this->getObjResponsable()}\n";

        return $cadena;
    }

    //OBTIENE EL NOMBRE DE UN PASAJERO SEGUN DNI
    public function obtenerNombrePasajero($dni){
        
        $pasajeros = $this->getPasajerosDelViaje();
        $nombrePasajero = null;
        foreach ($pasajeros as $pasajero) {
            if ($pasajero->getNroDocumento() == $dni) {
                $nombrePasajero = $pasajero->getNombre();
            }
            return $nombrePasajero;
        }
    }

    //OBTIENE EL APELLIDO DE UN PASAJERO SEGUN DNI
    public function obtenerApellidoPasajero($dni){
        $pasajeros = $this->getPasajerosDelViaje();
        $apellidoPasajero = null;
        foreach ($pasajeros as $pasajero) {
            if ($pasajero->getNroDocumento() == $dni) {
                $apellidoPasajero = $pasajero->getApellido();    
            }
            return $apellidoPasajero;
        }
    }

    // AGREGAR UN PASAJERO
    public function agregarPasajero($nuevoPasajero){
        $arr = ($this->getPasajerosDelViaje());
        $i = count($arr);

        array_push($arr, $nuevoPasajero);
        
        $this->setPasajerosDelViaje($arr);   
    }

    // ELIMINAR UN PASAJERO
    public function elimanrPasajero($dni){
        $pasajeros = $this->getPasajerosDelViaje();

        foreach ($pasajeros as $pasajero) {
            if ($pasajero->getNroDocumento() == $dni) {
                unset($pasajeros[$pasajeros]);
                $arrPasajeros = array_values($pasajeros);
                $this->setPasajerosDelViaje($arrPasajeros);
            }
        }
    } 

    // BUSCAR PASAJERO
    function buscarPasajero($dni){
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
}


?>