<?php

include "Viaje.php";

class ViajeAereo extends Viaje
{
    private $nroDeVuelo;
    private $categoria;
    private $escalas;

    public function __construct($codigo, $destino, $cantidadMax, $pasajerosDelViaje, $objResponsable, $importe, $idayVuelta, $nroDeVuelo, $categoria, $escalas)
    {
        parent :: __construct($codigo, $destino, $cantidadMax, $pasajerosDelViaje, $objResponsable, $importe, $idayVuelta);

        $this->nroDeVuelo = $nroDeVuelo;
        $this->categoria = $categoria;
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

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getEscalas()
    {
        return $this->escalas;
    }

    public function setEscalas($escalas)
    {
        $this->escalas = $escalas;
    }

    public function __toString()
    {
        $cadena = parent :: __toString();
        $cadena .= "\n Nº de vuelo: " . $this->getNroDeVuelo() . "\n" .
        "Categoría: " . $this->getCategoria() . "\n" . 
        "Escalas: " . $this->getEscalas() . "\n";
        return $cadena;
    }
}

?>