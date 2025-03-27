<?php
class Persona {
    private $nombre;
    private $fecnac;
    private $tel;

    public function __construct($nombre, $fecnac, $tel) {
        $this->nombre = $nombre;
        $this->fecnac = $fecnac;
        $this->tel = $tel;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($value) {
        $this->nombre = $value;
    }

    public function getFecNac() {
        return $this->fecnac;
    }

    public function setFecNac($value) {
        $this->fecnac = $value;
    }

    public function getTel() {
        return $this->tel;
    }

    public function setTel($value) {
        $this->tel = $value;
    }

    // Nuevo método para calcular la edad
    public function getEdad() {
        return (new DateTime())->diff(new DateTime($this->fecnac))->y;
    }
}
//El cierre de php no se incluye porque el script debe ser incluido en otro