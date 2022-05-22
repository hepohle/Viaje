<?php
class Viaje{
    
//ATRIBUTOS
    private $codigo;
    private $destino;
    private $cantidadMax;
    private $pasajerosDelViaje = [];
    private $objResponsable;
    private $importe;
    private $tipoAsiento;
    private $idayVuelta; //boolean

//CONSTRUCTOR
    public function __construct($codigo, $destino, $cantidadMax, $pasajerosDelViaje, $objResponsable, $importe, $tipoAsiento, $idayVuelta)
    {
       $this->codigo = $codigo;
       $this->destino = $destino;
       $this->cantidadMax = $cantidadMax;
       $this->pasajerosDelViaje = $pasajerosDelViaje;
       $this->objResponsable = $objResponsable;
       $this->importe = $importe;
       $this->tipoAsiento = $tipoAsiento;
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

    public function getTipoAsiento(){
        return $this->tipoAsiento;
    }

    public function setTipoAsiento($tipoAsiento){
        $this->tipoAsiento = $tipoAsiento;
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
        "Tipo de Asiento: " . $this->getTipoAsiento() . "\n" .
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

    // public function hayPasajesDisponible($cantPasajes)
    // {
    //     $hayLugar = false;
    //     $cantPasajeros = count($this->getPasajerosDelViaje());
    //     $totalPasajeros = $cantPasajeros + $cantPasajes;
    //     $cantAsientos = count($this->getCantidadMax());
    //     if ($totalPasajeros < $cantAsientos) {
    //         $hayLugar = true;
    //     }
    //     return $hayLugar;
    // }

    public function hayPasajesDisponibles(){
        $pasajes = false;
        if (count($this->getPasajerosDelViaje()) < $this->getCantidadMax()) {
            $pasajes = true;
        }
        return $pasajes;
    }

    public function venderPasaje($objPasajero){
        $importe = null;
        if ($this->hayPasajesDisponibles()) {
            $this->agregarPasajero($objPasajero);
            $importe = $this->getImporte();
            if ($this->getIdayVuelta()) {
                $importe = $importe * 1.5;
            }
        }
        return $importe;
    }

}

?>