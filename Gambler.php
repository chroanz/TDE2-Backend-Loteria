<?php

namespace Loteria;

// Importa a classe Ticket
require_once 'Ticket.php';

use Loteria\Ticket;

class Gambler {
    private $nome;  // Nome do jogador
    private $apostas = [];  // Array para armazenar as apostas
    private $numeros_apostados = [];  // Array para armazenar os números apostados
    private $valorGanho = 0;  // Valor ganho pelo jogador

    // Construtor da classe
    public function __construct($nome) {
        $this->nome = $nome;  // Define o nome do jogador
    }

    // Obtém o nome do jogador
    public function getNome(){
        return $this->nome;  // Retorna o nome do jogador
    }

    // Adiciona uma aposta ao jogador
    public function addAposta($ticket) {
        $ticket->setName($this->nome);  // Define o nome do jogador na aposta
        $this->apostas[] = $ticket;  // Adiciona a aposta ao array de apostas
    }

    // Obtém todas as apostas do jogador
    public function getApostas() {        
        return $this->apostas;  // Retorna todas as apostas do jogador
    }

    // Exibe as apostas do jogador
    public function getApostas2() {
        for ($i = 1; $i <= count($this->apostas); $i++) {

            $this->numeros_apostados = $this->apostas[$i - 1]->getNumerosApostados();
            echo "\n";
            echo "Aposta nº{$i}: ";
            for ($j = 0; $j < count($this->numeros_apostados); $j++) {        
                echo  "{$this->numeros_apostados[$j]} ";
            }
        }
      echo "\n";
    }
}

?>