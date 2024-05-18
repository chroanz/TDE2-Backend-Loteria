<?php

require_once 'Conexao.php'; // Certifique-se de incluir o arquivo de conexão
require_once 'Sorteio.php';
require_once 'SorteioDAO.php';
require_once 'Gambler.php';
require_once 'GamblerDAO.php';
require_once 'Ticket.php';
require_once 'TicketDAO.php';

use Loteria\Sorteio;
use Loteria\SorteioDAO;
use Loteria\Gambler;
use Loteria\GamblerDAO;
use Loteria\Ticket;
use Loteria\TicketDAO;


// Crie um objeto Sorteio
$sorteio = new Sorteio(3, 100000);

// Crie um objeto SorteioDAO
$sorteioDAO = new SorteioDAO();

// Chame os métodos CRUD conforme necessário
$sorteioDAO->create($sorteio); // Crie um novo sorteio no banco de dados

// Crie um objeto Gambler
$gambler = new Gambler("João");

// Crie um objeto Ticket
$ticket = new Ticket(1, $sorteio, [1, 2, 3, 4, 5, 6]);

$gamblerDAO = new GamblerDAO();
$gamblerDAO->create($gambler); // Crie um novo apostador no banco de dados

$ticketDAO = new TicketDAO();
$ticketDAO->create($ticket); // Crie um novo ticket no banco de dados

// Seta os números sorteados
$sorteio->setSorteados([1, 2, 3, 4, 5, 6]);
$sorteioDAO->update($sorteio); // Atualize o sorteio no banco de dados

$sorteios = $sorteioDAO->read(); // Leia todos os sorteios
// Faça algo com os resultados, por exemplo:
foreach ($sorteios as $sorteio) {
    echo "ID: " . $sorteio['id'] . ", Valor: " . $sorteio['valor'] . ", Números Sorteados: " . $sorteio['numeros_sorteados'] . "<br>";
}





// // Importa todas as classes
// require_once 'Ticket.php';
// require_once 'Sorteio.php';
// require_once 'Gambler.php';
// require_once 'Generator.php';


// use Loteria\Ticket;
// use Loteria\Generator;
// use Loteria\Sorteio;
// use Loteria\Gambler;
// use Loteria\GamblerDAO;
// use Loteria\Conexao;
// use Loteria\SorteioDAO;
// use Loteria\TickedDAO;

// // Gera um ID único para o sorteio
// $id = Generator::generateUUID();

// // Cria um novo sorteio com o ID gerado
// $sorteio = new Sorteio($id, 10000000);
// $sorteioBD = new SorteioDAO();
// $sorteioBD->create($sorteio);

// // Obtém os números sorteados
// $numeros_sorteados = $sorteio->getSorteados();

// // Exibe o ID do sorteio
// echo "ID do sorteio: " . $sorteio->getid() . "\n";

// // Exibe os números sorteados
// echo "Números sorteados: ";

// for ($i = 0; $i < 6; $i++) {
//     echo $numeros_sorteados[$i] . " ";
// }

// echo "\n";

// // Cria dois tickets com números apostados
// $ticket = new Ticket(Generator::generateUUID(), $sorteio, [8, 12, 59, 3, 19, 21,]);
// $ticket2 = new Ticket(Generator::generateUUID(), $sorteio, [1, 2, 3, 4, 5, 6,]);


// // Cria um novo apostador
// $apostador1 = new Gambler("João");

// // Adiciona os dois tickets ao apostador
// $apostador1->addAposta($ticket);
// $apostador1->addAposta($ticket2);
// $apostador1->getApostas2();

// // Verifica se algum dos tickets do apostador foi sorteado
// $vencedor = false;

// foreach ($apostador1->getApostas() as $a){   
    
//     if($a->getFuiSorteado()){
//         $vencedor = true;        
//         echo "ticket sorteado: " . $a->getId() . "\n";        
//     }
// }

// // Exibe uma mensagem indicando se o apostador foi sorteado ou não
// if($vencedor){
//     echo $apostador1->getNome() . " foi sorteado!\n";  
// }else{
//     echo "Você foi de Santos! :(\n";
// }