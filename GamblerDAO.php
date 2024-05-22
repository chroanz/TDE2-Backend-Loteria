<?php

namespace Loteria;

use \PDO;
use Conexao;
use Loteria\Gambler;

class GamblerDAO {
    public function create(Gambler $gambler) {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("INSERT INTO gambler (cpf,nome, valorGanho) VALUES (?, ?, ?)");
        $stmt->bindValue(1, $gambler->getCpf());
        $stmt->bindValue(2, $gambler->getNome());
        $stmt->bindValue(3, $gambler->getValorGanho());

        $stmt->execute();
    }

    public function read() {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("SELECT * FROM gambler");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function readByCpf($cpf) {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("SELECT * FROM gambler WHERE cpf = ?");
        $stmt->bindValue(1, $cpf);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $gambler = new Gambler($result['nome'], $result['cpf']);
        $gambler->setValorGanho($result['valorGanho']);

        return $gambler;
    }

    public function update(Gambler $gambler) {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("UPDATE gambler SET valorGanho = ? WHERE cpf = ?");
        $stmt->bindValue(1, $gambler->getValorGanho());
        $stmt->bindValue(4, $gambler->getCpf());
        $stmt->execute();
    }

    public function delete(Gambler $gambler) {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("DELETE FROM gambler WHERE cpf = ?");
        $stmt->bindValue(1, $gambler->getCpf());
        $stmt->execute();
    }
}
