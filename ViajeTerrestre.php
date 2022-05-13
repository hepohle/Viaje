<?php

include "Viaje.php";

class ViajeTerrestre extends Viaje
{
    private $tipoDeAsiento; // Semicama o Cama

    public function __construct($codigo, $destino, $cantidadMax, $pasajerosDelViaje, $objResponsable, $importe, $idayVuelta, $tipoDeAsiento)
    {
        parent :: __construct($codigo, $destino, $cantidadMax, $pasajerosDelViaje, $objResponsable, $importe, $idayVuelta);

        $this->tipoDeAsiento = $tipoDeAsiento;
    }

    public function getTipoDeAsiento()
    {
        return $this->tipoDeAsiento;
    }

    public function setTipoDeAsiento($tipoDeAsiento)
    {
        $this->tipoDeAsiento = $tipoDeAsiento;
    }

    public function __toString()
    {
        $cadena = parent :: __toString();
        $cadena .= "\n Tipo de Asiento: " . $this->getTipoDeAsiento() . "\n";
        return $cadena;
    }
}

?>