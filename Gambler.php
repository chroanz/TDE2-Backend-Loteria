<?php

namespace Loteria;

require_once 'Ticket.php';

use Loteria\Ticket;

class Gambler {
    private $nome;
    private $apostas = [];
    private $numeros_apostados = [];
    private $valorGanho = 0;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function addAposta($ticket) {
        $ticket->setName($this->nome);
        $this->apostas[] = $ticket;
    }

    public function getApostas() {        
        return $this->apostas;
    }

    public function getApostas2() {
        for ($i = 1; $i <= count($this->apostas); $i++) {

            $this->numeros_apostados = $this->apostas[$i - 1]->getNumerosApostados();
            echo "\n";
            echo "Aposta nº{$i}: ";
            for ($j = 0; $j < count($this->numeros_apostados); $j++) {        
                echo  "{$this->numeros_apostados[$j]} ";
            }
        }
    }
}

?>