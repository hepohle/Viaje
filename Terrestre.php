<?php

require_once ("Viaje.php");

class Terrestre extends Viaje
{
    

    public function __construct($codigo, $destino, $cantidadMax, $pasajerosDelViaje, $objResponsable, $importe, $tipoAsiento, $idayVuelta)
    {
        parent :: __construct($codigo, $destino, $cantidadMax, $pasajerosDelViaje, $objResponsable, $importe, $tipoAsiento, $idayVuelta);

    }

    public function __toString()
    {
        $cadena = parent :: __toString();
        
        return $cadena;
    }

    /** TipoAsiento semicama o cama --->> 1 = cama */
    public function venderPasaje($objPasajero)
    {
        $importe = parent::venderPasaje($objPasajero);
        if ($importe != null && parent::getTipoAsiento() == 1) {
            $asientoCama = $importe * 1.25;
            $importe = $importe + $asientoCama;
        }
        return $importe;
    }
}

?>