<?php

require_once 'Ticket.php';
require_once 'Sorteio.php';
require_once 'Gambler.php';
require_once 'Generator.php';

use Loteria\Ticket;
use Loteria\Generator;
use Loteria\Sorteio;
use Loteria\Gambler;

$id = Generator::generateUUID();
$sorteio = new Sorteio($id, 100);
$numeros_sorteados = $sorteio->getSorteados();

echo "ID do sorteio: " . $sorteio->getid() . "\n";

echo "Números sorteados: ";

for ($i = 0; $i < 6; $i++) {
    echo $numeros_sorteados[$i] . " ";
}

echo "\n";

$ticket = new Ticket(Generator::generateUUID(), $sorteio, [1, 1, 1, 1, 1, 1,]);
$ticket2 = new Ticket(Generator::generateUUID(), $sorteio, [1, 1, 1, 1, 1, 1,]);

$apostador1 = new Gambler("João");
$apostador1->addAposta($ticket);
$apostador1->addAposta($ticket2);
// $apostador1->getApostas();
$vencedor = false;

foreach ($apostador1->getApostas() as $a){   
    
    if($a->getFuiSorteado()){
        $vencedor = true;        
        echo "ticket sorteado: " . $a->getId() . "\n";        
    }
}

if($vencedor){
    echo $apostador1->getNome() . " foi sorteado!\n";  
}else{
    echo "Você foi de Santos! :(\n";
}

?>