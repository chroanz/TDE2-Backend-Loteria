<?php

namespace Loteria;

use \PDO;
use Conexao;
use Loteria\Sorteio;

class SorteioDAO {
    public function create(Sorteio $sorteio) {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("INSERT INTO sorteio (id, valor, numeros_sorteados) VALUES (?, ?, ?)");
        $stmt->bindValue(1, $sorteio->getid());
        $stmt->bindValue(2, $sorteio->getValor());
        $stmt->bindValue(3, implode(",", $sorteio->getSorteados()));
        $stmt->execute();
    }

    public function read() {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("SELECT * FROM sorteio");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function readById($id) {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("SELECT * FROM sorteio WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $sorteio = new Sorteio($result['id'], $result['valor']);
        $sorteio->setSorteados(explode(",", $result['numeros_sorteados']));

        return $sorteio;
    }

    public function update(Sorteio $sorteio) {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("UPDATE sorteio SET valor = ?, numeros_sorteados = ? WHERE id = ?");
        $stmt->bindValue(1, $sorteio->getValor());
        $stmt->bindValue(2, implode(",", $sorteio->getSorteados()));
        $stmt->bindValue(3, $sorteio->getid());
        $stmt->execute();
    }

    public function delete(Sorteio $sorteio) {
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("DELETE FROM sorteio WHERE id = ?");
        $stmt->bindValue(1, $sorteio->getid());
        $stmt->execute();
    }
}
