<?php

namespace Loteria;

require_once 'Sorteio.php';

use Loteria\Sorteio;


class Ticket {
    private $id;
    private Sorteio $sorteio;
    private $nome;
    private $numeros_apostados = [];

    public function __construct($id, $sorteio, array $numeros_apostados) {
        $this->id = $id;
        $this->sorteio = $sorteio;

        $this->numeros_apostados = $numeros_apostados;
    }
    public function getId(){
        return $this->id;
    }

    public function setName($nome){
        $this->$nome = $nome;
    }

    public function getNumerosApostados() {
        return $this->numeros_apostados;
    }

    public function getFuiSorteado(): bool {
        $num_sortados = $this->sorteio->getSorteados();

        return in_array($this->numeros_apostados[0], $num_sortados)
            && in_array($this->numeros_apostados[1], $num_sortados)
            && in_array($this->numeros_apostados[2], $num_sortados)
            && in_array($this->numeros_apostados[3], $num_sortados)
            && in_array($this->numeros_apostados[4], $num_sortados)
            && in_array($this->numeros_apostados[5], $num_sortados);
    }
}
?>