<?php

/* 
La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. 
De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.

Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros). 
Utilice un array que almacene la información correspondiente a los pasajeros. 
Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.

Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos. 
*/

class Viaje{
    
//ATRIBUTOS
    private $codigo;
    private $destino;
    private $cantidadMax;
    private $pasajerosDelViaje = [];

//CONSTRUCTOR
    public function __construct($codigo, $destino, $cantidadMax, $pasajerosDelViaje)
    {
       $this->codigo = $codigo;
       $this->destino = $destino;
       $this->cantidadMax = $cantidadMax;
       $this->pasajerosDelViaje = $pasajerosDelViaje;
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

//__toString
    public function __toString()
    {
        return (
        "----- VIAJE -----\n".
        "Código del viaje: " . $this->getCodigo() . "\n" .
        "Destino del viaje: " . $this->getDestino() . "\n" .
        "Cantidad máxima de pasajeros: " . $this->getCantidadMax() . "\n" . 
        "Pasajeros: " . $this->getPasajerosDelViaje() . "\n"
        );
    }

    //OBTIENE EL NOMBRE DE UN PASAJERO SEGUN UN INDICE
    public function obtenerNombrePasajero($indice){
        $i_pasajero_nombre = ($this->getPasajerosDelViaje())[$indice -1]["nombre"];
        return $i_pasajero_nombre;
    }

    //OBTIENE EL APELLIDO DE UN PASAJERO SEGUN UN INDICE
    public function obtenerApellidoPasajero($indice){
        $i_pasajero_apellido = ($this->getPasajerosDelViaje())[$indice -1]["apellido"];
        return $i_pasajero_apellido;
    }

    //OBTIENE EL DNI DE UN PASAJERO SEGUN UN INDICE
    public function obtenerDNIPasajero($indice){
        $i_pasajero_dni = ($this->getPasajerosDelViaje())[$indice -1]["dni"];
        return $i_pasajero_dni;
    }

    //MODIFICAR PASAJERO
    public function modificarPasajeroNombre($pasajerosDelViaje, $indice, $nuevoNombre){
        $pasajerosDelViaje[$indice]["nombre"] = $nuevoNombre;
    }

    public function modificarPasajeroApellido($pasajerosDelViaje, $indice){
        
    }

    public function modificarPasajeroDni($pasajerosDelViaje, $indice){
        
    }

    //AGREGAR UN PASAJERO
    public function agregarPasajero($nuevoPasajero){
        //$indice = count($pasajerosDelViaje);
        $arr = ($this->getPasajerosDelViaje());
        array_push($arr, $nuevoPasajero);
        
        $this->setPasajerosDelViaje($arr);
        
    }

    //MODIFICAR VIAJE
    public function modificarCodigo($viaje, $nuevoCodigo){
        $viaje->setCodigo($nuevoCodigo);
    }

    public function modificarDestino($viaje, $nuevoDestino){
        $viaje->setDestino($nuevoDestino);
    }

    public function modificarCantidadMax($viaje, $nuevaCantMax){
        $viaje->setCantidadMax($nuevaCantMax); 
    }
}
?>