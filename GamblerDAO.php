<?php

namespace Loteria;

use Conexao;

Class GamblerDAO {

    public function create (Gambler $gambler) {
        $sql = "INSERT INTO gambler (nome, apostas, numeros_apostados, valorGanho) VALUES (?, ?, ?, ?)";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $gambler->getNome());
        $stmt->bindValue(2, implode(",", $gambler->getApostas()));
        $stmt->bindValue(3, implode(",", $gambler->getNumerosApostados()));
        $stmt->bindValue(4, $gambler->getValorGanho());
        $stmt->execute();
    }

    public function read () {
        $sql = "SELECT * FROM gambler";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function update (Gambler $gambler) {
        $sql = "UPDATE gambler SET apostas = ?, numeros_apostados = ?, valorGanho = ? WHERE nome = ?";  
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, implode(",", $gambler->getApostas()));
        $stmt->bindValue(2, implode(",", $gambler->getNumerosApostados()));
        $stmt->bindValue(3, $gambler->getValorGanho());
        $stmt->bindValue(4, $gambler->getNome());
        $stmt->execute();
    }

    public function delete (Gambler $gambler) {
        $sql = "DELETE FROM gambler WHERE nome = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $gambler->getNome());
        $stmt->execute();
    }
}