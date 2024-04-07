<?php

namespace Loteria;

class Sorteio {
    private $id;
    private $valor;
    private $numeros_sorteados = [];

    public function __construct($id, $valor) {
        $this->id = $id;
        $this->valor = $valor;
        for ($i = 0; $i < 6; $i++) {
            array_push($this->numeros_sorteados, rand(1, 60));
        }
    }
    public function getSorteados() {
        return $this->numeros_sorteados;
    }
    public function getid() {
        return $this->id;
    }
}
?>