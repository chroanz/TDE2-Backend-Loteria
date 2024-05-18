<?php

namespace Loteria;

// Importa a classe Ticket
require_once 'Ticket.php';

use Loteria\Ticket;

class Gambler {
    private $nome;  // Nome do jogador
    private $valorGanho = 0;  // Valor ganho pelo jogador

    // Construtor da classe
    public function __construct($nome) {
        $this->nome = $nome;  // Define o nome do jogador
    }

    // Obtém o nome do jogador
    public function getNome(){
        return $this->nome;  // Retorna o nome do jogador
    }

    // Obtém o valor ganho pelo jogador
    public function getValorGanho() {
        return $this->valorGanho;  // Retorna o valor ganho pelo jogador
    }

    // Define o valor ganho pelo jogador
    public function setValorGanho($valor) {
        $this->valorGanho = $valor;  // Define o valor ganho pelo jogador
    }
}