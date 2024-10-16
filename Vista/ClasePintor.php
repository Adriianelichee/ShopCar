<?php
class Pintor {
    public static function listamarcas($marcas) {
        echo "Lista de marcas:\n";
        foreach ($marcas as $marca) {
            echo "- " . $marca->getMarca() . "\n";
        }
    }
}
