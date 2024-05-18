<?php

namespace Loteria;

use \PDO;
use Conexao;
use Loteria\Sorteio;

Class SorteioDAO {
    public function create (Sorteio $sorteio)
    {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("INSERT INTO sorteio (id, valor, numeros_sorteados) VALUES (?, ?, ?)");
        $stmt->bindValue(1, $sorteio->getid());
        $stmt->bindValue(2, $sorteio->getValor());
        $stmt->bindValue(3, implode(",", $sorteio->getSorteados()));
        $stmt->execute();
    }

    public function read()
    {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("SELECT * FROM sorteio");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update(Sorteio $sorteio)
    {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("UPDATE sorteio SET valor = ?, numeros_sorteados = ? WHERE id = ?");
        $stmt->bindValue(1, $sorteio->getValor());
        $stmt->bindValue(2, implode(",", $sorteio->getSorteados()));
        $stmt->bindValue(3, $sorteio->getid());
        $stmt->execute();
    }

    public function delete(Sorteio $sorteio)
    {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("DELETE FROM sorteio WHERE id = ?");
        $stmt->bindValue(1, $sorteio->getid());
        $stmt->execute();
    }
}