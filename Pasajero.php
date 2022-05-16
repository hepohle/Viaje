<?php

class Pasajero
{
    private $nombre;
    private $apellido;
    private $nroDocumento;
    private $telefono;

    public function __construct($nombre, $apellido, $nroDocumento, $telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nroDocumento = $nroDocumento;
        $this->telefono = $telefono;
    }

    

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
        return $this;
    }

    public function getNroDocumento()
    {
        return $this->nroDocumento;
    }

    public function setNroDocumento($nroDocumento)
    {
        $this->nroDocumento = $nroDocumento;
        return $this;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
        return $this;
    }

    public function __toString()
    {
        $cadena = "
        Nombre: {$this->getNombre()}\n
        Apellido: {$this->getApellido()}\n
        Nº de Documento: {$this->getNroDocumento()}\n
        Teléfono: {$this->getTelefono()}\n";

        return $cadena;
    }
}

?>