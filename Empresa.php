<?php

class Empresa{

    private $nombreEmpresa;
    private $coleccionViajes;

    public function __construct($nombreEmpresa)
    {
        $this->nombreEmpresa = $nombreEmpresa;
        $this->coleccionViajes = [];
    }

    public function getNombreEmpresa(){
        return $this->nombreEmpresa;
    }

    public function setNombreEmpresa($nombreEmpresa){
        $this->nombreEmpresa = $nombreEmpresa;
    }

    public function getColeccionViajes(){
        return $this->coleccionViajes;
    }

    public function setColeccionViajes($coleccionViajes){
        $this->coleccionViajes = $coleccionViajes;
    }

    private function viajesToString(){
        $cadena = "";
        $viajes = $this->getColeccionViajes();
        foreach ($viajes as $key => $value) {
            $viaje = $value;
            $cadenaViaje = $viaje->__toString();
            $cadena .= $cadenaViaje;
        }
        return $cadena;
    }

    public function __toString()
    {
        $viajes = $this->viajesToString();
        $cadena = "Nombre: " . $this->getNombreEmpresa() . "\n" . 
        "Viajes: \n" . $viajes;
        return $cadena;
    }


}

?>