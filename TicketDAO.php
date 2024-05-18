<?php

namespace Loteria;

use Conexao;
Class TicketDAO {
    
    public function create (Ticket $ticket) {
        $sql = "INSERT INTO ticket (id, idSorteio, nome, numeros_apostados) VALUES (?, ?, ?, ?)";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $ticket->getid());
        $stmt->bindValue(2, $ticket->getIdSorteio());
        $stmt->bindValue(3, $ticket->getNome());
        $stmt->bindValue(4, implode(",", $ticket->getNumerosApostados()));
        $stmt->execute();
    }

    public function read () {
        $sql = "SELECT * FROM ticket";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function update (Ticket $ticket) {
        $sql = "UPDATE ticket SET idSorteio = ?, nome = ?, numeros_apostados = ? WHERE id = ?";  
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $ticket->getIdSorteio());
        $stmt->bindValue(2, $ticket->getNome());
        $stmt->bindValue(3, implode(",", $ticket->getNumerosApostados()));
        $stmt->bindValue(4, $ticket->getid());
        $stmt->execute();
    }

    public function delete (Ticket $ticket) {
        $sql = "DELETE FROM ticket WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $ticket->getid());
        $stmt->execute();
    }
}