<?php

namespace Loteria;

// Importa a classe Sorteio
require_once 'Sorteio.php';

use Loteria\Sorteio;


class Ticket
{
    private $id;  // ID do ticket
    private Sorteio $sorteio;  // Objeto Sorteio associado a este ticket
    private $nome;  // Nome do Jogador
    private $numeros_apostados = [];  // Números apostados neste ticket
    private $idSorteio;

    // Construtor da classe
    public function __construct($id, $sorteio, array $numeros_apostados)
    {
        $this->id = $id;
        $this->sorteio = $sorteio;
        $this->idSorteio = $sorteio->getId();
        $this->numeros_apostados = $numeros_apostados;
    }

    // Obtém o ID do ticket
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }
    // Define o nome associado ao ticket
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getIdSorteio()
    {
        return $this->idSorteio;
    }

    public function setIdSorteio($idSorteio)
    {
        $this->idSorteio = $idSorteio;
    }

    // Obtém os números apostados neste ticket
    public function getNumerosApostados()
    {
        return $this->numeros_apostados;
    }

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