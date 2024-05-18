<?php

namespace Loteria;

// Importa a classe Sorteio
require_once 'Sorteio.php';

use Loteria\Sorteio;


class Ticket {
    private $id;  // ID do ticket
    private Sorteio $sorteio;  // Objeto Sorteio associado a este ticket
    private $nome;  // Nome do Jogador
    private $numeros_apostados = [];  // Números apostados neste ticket

    // Construtor da classe
    public function __construct($id, $sorteio, array $numeros_apostados) {
        $this->id = $id;
        $this->sorteio = $sorteio;
        $this->numeros_apostados = $numeros_apostados;
    }
    // Obtém o ID do ticket
    public function getId(){
        return $this->id;
    }

    // Define o ID do ticket
    public function setId($id){
        $this->id = $id;
    }

    // Obtém o objeto Sorteio associado a este ticket
    public function getSorteio(){
        return $this->sorteio;
    }

    // Define o objeto Sorteio associado a este ticket
    public function setSorteio($sorteio){
        $this->sorteio = $sorteio;
    }

    // Obtém o nome do jogador
    public function getNome(){
        return $this->nome;
    }

    // Define o nome do jogador
    public function setNome($gambler){
        $this->nome = $gambler->getNome();
    }

    // Obtém os números apostados neste ticket
    public function getNumerosApostados() {
        return $this->numeros_apostados;
    }

    // Define os números apostados neste ticket
    public function setNumerosApostados($numeros_apostados) {
        $this->numeros_apostados = $numeros_apostados;
    }


    // Define o nome associado ao ticket
    public function setName($nome){
        $this->nome = $nome;
    }


    // Verifica se os números apostados neste ticket foram sorteados
    public function getFuiSorteado(): bool {
      // Obtém os números sorteados no sorteio associado a este ticket
        $num_sortados = $this->sorteio->getSorteados();

        return in_array($this->numeros_apostados[0], $num_sortados)
            && in_array($this->numeros_apostados[1], $num_sortados)
            && in_array($this->numeros_apostados[2], $num_sortados)
            && in_array($this->numeros_apostados[3], $num_sortados)
            && in_array($this->numeros_apostados[4], $num_sortados)
            && in_array($this->numeros_apostados[5], $num_sortados);
    }
}