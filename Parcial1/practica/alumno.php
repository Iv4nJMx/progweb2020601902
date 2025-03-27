<?php
class Alumno {
    private $apellido;
    private $nombre;
    private $p1;
    private $p2;
    private $p3;
    private $final;

    public function __construct($apellido,$nombre, $p1, $p2, $p3) {
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->p1 = $p1;
        $this->p2 = $p2;
        $this->p3 = $p3;
    }
    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($value) {
        $this->apellido = $value;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($value) {
        $this->nombre = $value;
    }

    public function getp1() {
        return $this->p1;
    }

    public function setp1($value) {
        $this->p1 = $value;
    }

    public function getp2() {
        return $this->p2;
    }

    public function setp2($value) {
        $this->p2 = $value;
    }
    public function getp3() {
        return $this->p3;
    }

    public function setp3($value) {
        $this->p3 = $value;
    }
    public function getfinal() {
        return round(($this->p1 + $this->p2 + $this->p3) / 3);
    
    }
}