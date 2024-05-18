<?php

namespace Loteria;

use \PDO;
use Conexao;
use Loteria\Ticket;

Class TicketDAO{
    public function create(Ticket $ticket){
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("INSERT INTO ticket (id, sorteio, nome, numeros_apostados) VALUES (?, ?, ?, ?)");
        $stmt->bindValue(1, $ticket->getId());
        $stmt->bindValue(2, $ticket->getSorteio()->getId());
        $stmt->bindValue(3, $ticket->getNome());
        $stmt->bindValue(4, implode(",", $ticket->getNumerosApostados()));
        $stmt->execute();
    }

    public function read(){
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("SELECT * FROM ticket");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update(Ticket $ticket){
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("UPDATE ticket SET sorteio = ?, nome = ?, numeros_apostados = ? WHERE id = ?");
        $stmt->bindValue(1, $ticket->getSorteio()->getId());
        $stmt->bindValue(2, $ticket->getNome());
        $stmt->bindValue(3, implode(",", $ticket->getNumerosApostados()));
        $stmt->bindValue(4, $ticket->getId());
        $stmt->execute();
    }

    public function delete(Ticket $ticket){
        $conn = Conexao::getConn();
        $stmt = $conn->prepare("DELETE FROM ticket WHERE id = ?");
        $stmt->bindValue(1, $ticket->getId());
        $stmt->execute();
    }
    
}