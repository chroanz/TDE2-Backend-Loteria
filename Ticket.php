<?php

namespace Loteria;

// Importa a classe Sorteio
require_once 'Sorteio.php';
require_once 'Gambler.php';

use Loteria\Sorteio;
use Loteria\Gambler;



class Ticket
{
    private $id;  // ID do ticket
    private Sorteio $sorteio;  // Objeto Sorteio associado a este ticket
    private $cpf;  // Cpf do Jogador
    private $numeros_apostados = [];  // Números apostados neste ticket

    // Construtor da classe
    public function __construct($id, $gambler, $sorteio, array $numeros_apostados)
    {
        $this->id = $id;
        $this->sorteio = $sorteio;
        $this->numeros_apostados = $numeros_apostados;
        $this->cpf = $gambler->getCpf();
    }
    // Obtém o ID do ticket
    public function getId()
    {
        return $this->id;
    }

    // Define o ID do ticket
    public function setId($id)
    {
        $this->id = $id;
    }

    // Obtém o objeto Sorteio associado a este ticket
    public function getSorteio()
    {
        return $this->sorteio;
    }

    // Define o objeto Sorteio associado a este ticket
    public function setSorteio($sorteio)
    {
        $this->sorteio = $sorteio;
    }

    // Obtém o nome do jogador
    public function getCpf()
    {
        return $this->cpf;
    }

    // Define o nome do jogador
    public function setCpf($gambler)
    {
        $this->cpf = $gambler->getCpf();
    }

    // Obtém os números apostados neste ticket
    public function getNumerosApostados()
    {
        return $this->numeros_apostados;
    }

    // Define os números apostados neste ticket
    public function setNumerosApostados($numeros_apostados)
    {
        $this->numeros_apostados = $numeros_apostados;
    }

    // Verifica se os números apostados neste ticket foram sorteados
    public function getFuiSorteado(): bool
    {
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
