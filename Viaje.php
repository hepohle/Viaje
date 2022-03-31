<?php

/* 
La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.

Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros). Utilice un array que almacene la información correspondiente a los pasajeros. Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.

Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos. 
*/

class Viaje{
    
//ATRIBUTOS
    public $codigo;
    public $destino;
    public $cantidadMax;
    public $pasajerosDelViaje;

//CONSTRUCTOR
    public function __construct($codigo, $destino, $cantidadMax, $pasajerosDelViaje)
    {
       $this->codigo = $codigo;
       $this->destino = $destino;
       $this->cantidadMax = $cantidadMax;
       $this->pasajerosDelViaje = $pasajerosDelViaje;
    }

//METODOS
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

//__toString
    public function __toString()
    {
        $v_codigo = $this->getCodigo();
        $v_destino = $this->getDestino();
        $v_cantMax = $this->getCantidadMax();
        $v_pasajeros = $this->getPasajerosDelViaje();
        return (
        "Código del viaje: " . $v_codigo . "\n" .
        "Destino del viaje: " . $v_destino . "\n" .
        "Cantidad máxima de pasajeros: " . $v_cantMax . "\n" . 
        "Pasajeros: " . $v_pasajeros . "\n"
        );
    }
}
?>