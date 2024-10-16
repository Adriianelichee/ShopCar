<?php
Class Marca {
    public $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function getMarca() {
        return $this->nombre;
    }
}