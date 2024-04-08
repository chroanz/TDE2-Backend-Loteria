<?php

// Importa todas as classes
require_once 'Ticket.php';
require_once 'Sorteio.php';
require_once 'Gambler.php';
require_once 'Generator.php';

use Loteria\Ticket;
use Loteria\Generator;
use Loteria\Sorteio;
use Loteria\Gambler;

// Gera um ID único para o sorteio
$id = Generator::generateUUID();

// Cria um novo sorteio com o ID gerado
$sorteio = new Sorteio($id, 100);

// Obtém os números sorteados
$numeros_sorteados = $sorteio->getSorteados();

// Exibe o ID do sorteio
echo "ID do sorteio: " . $sorteio->getid() . "\n";

// Exibe os números sorteados
echo "Números sorteados: ";

for ($i = 0; $i < 6; $i++) {
    echo $numeros_sorteados[$i] . " ";
}

echo "\n";

// Cria dois tickets com números apostados
$ticket = new Ticket(Generator::generateUUID(), $sorteio, [1, 1, 1, 1, 1, 1,]);
$ticket2 = new Ticket(Generator::generateUUID(), $sorteio, [1, 1, 1, 1, 1, 1,]);

// Cria um novo apostador
$apostador1 = new Gambler("João");

// Adiciona os dois tickets ao apostador
$apostador1->addAposta($ticket);
$apostador1->addAposta($ticket2);
$apostador1->getApostas2();

// Verifica se algum dos tickets do apostador foi sorteado
$vencedor = false;

foreach ($apostador1->getApostas() as $a){   
    
    if($a->getFuiSorteado()){
        $vencedor = true;        
        echo "ticket sorteado: " . $a->getId() . "\n";        
    }
}

// Exibe uma mensagem indicando se o apostador foi sorteado ou não
if($vencedor){
    echo $apostador1->getNome() . " foi sorteado!\n";  
}else{
    echo "Você foi de Santos! :(\n";
}

?>