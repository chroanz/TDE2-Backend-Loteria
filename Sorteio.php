<?php

namespace Loteria;

class Sorteio {
    private $id;  // ID do sorteio
    private $valor;  // Valor do sorteio
    private $numeros_sorteados = [];  // Array para armazenar os números sorteados

    // Construtor da classe Sorteio

    public function __construct($id, $valor) {
        $this->id = $id;
        $this->valor = $valor;
      
        // Gera aleatoriamente 6 números e os adiciona ao array de números sorteados
        for ($i = 0; $i < 6; $i++) {
            array_push($this->numeros_sorteados, rand(1, 60));
        }
    }

    // Obtém os números sorteados neste sorteio
    public function getSorteados() {
        return $this->numeros_sorteados;
    }

    // Obtém o ID do sorteio
    public function getid() {
        return $this->id;
    }
}
?>