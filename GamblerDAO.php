<?php

namespace Loteria;

use \PDO;
use Conexao;
use Loteria\Gambler;

Class GamblerDAO {
    public function create (Gambler $gambler)
    {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("INSERT INTO gambler (nome, valorGanho, apostas, numeros_apostados) VALUES (?, ?, ?, ?)");
        $stmt->bindValue(1, $gambler->getNome());
        $stmt->bindValue(2, $gambler->getValorGanho());
        $stmt->bindValue(3, serialize($gambler->getApostas()));
        $stmt->bindValue(4, serialize($gambler->getNumerosApostados()));
        $stmt->execute();
    }

    public function read()
    {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("SELECT * FROM gambler");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update(Gambler $gambler)
    {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("UPDATE gambler SET valorGanho = ?, apostas = ?, numeros_apostados = ? WHERE nome = ?");
        $stmt->bindValue(1, $gambler->getValorGanho());
        $stmt->bindValue(2, serialize($gambler->getApostas()));
        $stmt->bindValue(3, serialize($gambler->getNumerosApostados()));
        $stmt->bindValue(4, $gambler->getNome());
        $stmt->execute();
    }

    public function delete(Gambler $gambler)
    {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("DELETE FROM gambler WHERE nome = ?");
        $stmt->bindValue(1, $gambler->getNome());
        $stmt->execute();
    }
}