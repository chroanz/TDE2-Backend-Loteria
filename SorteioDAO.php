<?php

namespace Loteria;

use Conexao;

Class SorteioDAO {
    
    public function create (Sorteio $sorteio) {
        $sql = "INSERT INTO sorteio (id, valor, numeros_sorteados) VALUES (?, ?, ?)";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $sorteio->getid());
        $stmt->bindValue(2, $sorteio->getValor());
        $stmt->bindValue(3, implode(",", $sorteio->getSorteados()));
        $stmt->execute();
    }

    public function read () {
        $sql = "SELECT * FROM sorteio";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function update (Sorteio $sorteio) {
        $sql = "UPDATE sorteio SET valor = ?, numeros_sorteados = ? WHERE id = ?";  
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $sorteio->getValor());
        $stmt->bindValue(2, implode(",", $sorteio->getSorteados()));
        $stmt->bindValue(3, $sorteio->getid());
        $stmt->execute();
    }

    public function delete (Sorteio $sorteio) {
        $sql = "DELETE FROM sorteio WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $sorteio->getid());
        $stmt->execute();
    }
}