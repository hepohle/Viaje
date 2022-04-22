<?php

class ResponsableV
{
    private $nroEmpleado;
    private $nroLicencia;
    private $nombre;
    private $apellido;

    public function __construct($nroEmpleado, $nroLicencia, $nombre, $apellido)
    {
        $this->nroEmpleado = $nroEmpleado;
        $this->nroLicencia = $nroLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function getNroEmpleado()
    {
        return $this->nroEmpleado;
    }

    public function setNroEmpleado($nroEmpleado)
    {
        $this->nroEmpleado = $nroEmpleado;
        return $this;
    }

    public function getNroLicencia()
    {
        return $this->nroLicencia;
    }

    public function setNroLicencia($nroLicencia)
    {
        $this->nroLicencia = $nroLicencia;
        return $this;
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

    public function __toString()
    {
        $cadena = "
        Nº de Empleado: {$this->getNroEmpleado()}\n
        Nº de Licencia: {$this->getNroLicencia()}\n
        Nombre: {$this->getNombre()}\n
        Apellido: {$this->getApellido()}\n";

        return $cadena;
    }
}

?>