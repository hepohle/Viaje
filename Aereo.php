<?php

require_once ("Viaje.php");

class Aereo extends Viaje
{
    private $nroDeVuelo;
    private $nombreAerolinea;
    private $escalas;

    public function __construct($codigo, $destino, $cantidadMax, $pasajerosDelViaje, $objResponsable, $importe, $tipoAsiento, $idayVuelta, $nroDeVuelo, $nombreAerolinea, $escalas)
    {
        parent :: __construct($codigo, $destino, $cantidadMax, $pasajerosDelViaje, $objResponsable, $importe, $tipoAsiento, $idayVuelta);

        $this->nroDeVuelo = $nroDeVuelo;
        $this->nombreAerolinea = $nombreAerolinea;
        $this->escalas = $escalas;
    }

    public function getNroDeVuelo()
    {
        return $this->nroDeVuelo;
    }

    public function setNroDeVuelo($nroDeVuelo)
    {
        $this->nroDeVuelo = $nroDeVuelo;
    }

    public function getEscalas()
    {
        return $this->escalas;
    }

    public function setEscalas($escalas)
    {
        $this->escalas = $escalas;
    }

    public function getNombreAerolinea(){
        return $this->nombreAerolinea;
    }

    public function setNombreAerolinea($nombreAerolinea){
        $this->nombreAerolinea = $nombreAerolinea;
    }

    public function __toString()
    {
        $cadena = parent :: __toString();
        $cadena .= "\n Nº de vuelo: " . $this->getNroDeVuelo() . "\n" .
        "Escalas: " . $this->getEscalas() . "\n" . 
        "Aerolinea: " . $this->getNombreAerolinea() . "\n";

        return $cadena;
    }

    /** TipoAsiento primera clase o no --->> 1 = primera clase*/
    public function venderPasaje($objPasajero)
    {
       $importe = parent::venderPasaje($objPasajero);
       if ($importe != null) {
           $tipoAsiento = $this->getTipoAsiento();
           if ($tipoAsiento == 1) {
               if ($this->getEscalas() == 0) {
                   $importe = $importe * 1.4;
               }else
                    $importe = $importe * 1.6;
           }
       }
       return $importe;
    }
}

?>