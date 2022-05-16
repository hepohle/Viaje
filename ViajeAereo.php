<?php

require_once ("Viaje.php");

class ViajeAereo extends Viaje
{
    private $nroDeVuelo;
    private $categoria; //Primera Clase 0 Standard
    private $nombreAerolinea;
    private $escalas;

    public function __construct($codigo, $destino, $cantidadMax, $pasajerosDelViaje, $objResponsable, $importe, $idayVuelta, $nroDeVuelo, $categoria, $nombreAerolinea, $escalas)
    {
        parent :: __construct($codigo, $destino, $cantidadMax, $pasajerosDelViaje, $objResponsable, $importe, $idayVuelta);

        $this->nroDeVuelo = $nroDeVuelo;
        $this->categoria = $categoria;
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
        "Categoría: " . $this->getCategoria() . "\n" . 
        "Escalas: " . $this->getEscalas() . "\n" . 
        "Aerolinea: " . $this->getNombreAerolinea() . "\n";

        return $cadena;
    }

    public function calcularMontoTotal(){
        $importe = $this->getImporte();
        $escalas = $this->getEscalas();
        $categoria = $this->getCategoria();
        $idaVuelta = $this->getIdayVuelta();
        if ($categoria == "Primera Clase" && $escalas == 0) {
            $importe = $importe * 1.4;
        }elseif ($categoria == "Primera Clase" && $escalas > 0) {
            $importe = $importe * 1.6;
        }
        if ($idaVuelta) {
            $importe = $importe * 1.5;
        }
        return $importe;
    }
}

?>