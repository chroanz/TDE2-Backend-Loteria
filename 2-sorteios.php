<?php
require_once 'Conexao.php';
require_once 'Gambler.php';
require_once 'GamblerDAO.php';
require_once 'Generator.php';
require_once 'Sorteio.php';
require_once 'SorteioDAO.php';
require_once 'Ticket.php';
require_once 'TicketDAO.php';

use Loteria\Gambler;
use Loteria\GamblerDAO;
use Loteria\Generator;
use Loteria\Sorteio;
use Loteria\SorteioDAO;
use Loteria\Ticket;
use Loteria\TicketDAO;

$gamblerDAO = new GamblerDAO();
$sorteioDAO = new SorteioDAO();
$ticketDAO = new TicketDAO();

$gambler = new Gambler('', 0);

if (isset($_POST['new_gambler'])) {
  $gambler = new Gambler($_POST['name'], $_POST['cpf']);
  $gamblerDAO->create($gambler);
  setcookie('gambler_cpf', $gambler->getCpf(), time() + 3600);  //1h->60*60

} else if (isset($_COOKIE['gambler_cpf'])) {
  $gambler = $gamblerDAO->readByCpf($_COOKIE['gambler_cpf']);
} else {
  header('Location: 1-login.php');
}

if (isset($_POST['new_sorteio'])) {
  $sorteio = new Sorteio(rand(15, 500), 100000);
  $sorteioDAO->create($sorteio);
}

if (isset($_POST['new_ticket'])) {

  $gambler = $gamblerDAO->readByCpf($_POST['gambler_cpf']);
  $sorteio = $sorteioDAO->readById($_POST['sorteios']);

  $numbers = [];
  for ($i = 0; $i < 6; $i++) {
    array_push($numbers, $_POST['ticket_n' . $i]);
  }

  $ticket = new Ticket(Generator::generateUUID(), $gambler, $sorteio, $numbers);
  $ticketDAO->create($ticket);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Loteria Santos</title>
</head>

<body>
  <header class="bg-gray-900 text-white px-20 pt-3 pb-2 flex flex-row justify-between gap-3">
    <div class="flex items-center">
      <a href="./1-login.php">
        <img src="https://upload.wikimedia.org/wikipedia/commons/1/15/Santos_Logo.png" alt=" Santos Logo" class="max-w-20">
      </a>
      <div>
        <h2 class="text-2xl font-bold">Loteria do Santos</h2>
        <p class="text-base">Garantindo vitórias e notas boas desde 1912</p>
      </div>
    </div>
    <div class="flex flex-col gap-1 items-start">
      <?php
      echo '<p>Nome: <b class="font-bold ">' . $gambler->getNome() . '</b></p>';
      echo '<p>CPF: <b class="font-bold ">' . $gambler->getCpf() . '</b></p>';
      ?>
    </div>
  </header>

  <section class="bg-slate-100 flex">
    <aside class="pl-20 pr-4 pt-3 w-64 bg-slate-800 h-screen text-white">
      <h3 class="text-xl font-bold pb-2">Sorteios</h3>

      <form action="2-sorteios.php" method="post" class="pb-2">
        <input type="hidden" name="new_sorteio" value="true">
        <button class="w-full bg-blue-400 rounded-md py-2" type="submit"> Novo sorteio</button>
      </form>

      <ul class="flex flex-col gap-2">
        <?php
        $sorteios = $sorteioDAO->read();

        foreach ($sorteios as $sorteio) {
          echo '<li class="bg-slate-600 p-2">';
          echo '<h2 class="font-bold">Sorteio ' . $sorteio['id'] . '</h2>';
          echo '</li>';
        }
        ?>
      </ul>

    </aside>

    <div class="pt-3 pl-3 flex-grow">

      <div class="bg-slate-900 text-white min-w-72 px-5 py-2 flex flex-col gap-1 ">
        <h3 class="text-xl font-bold pb-2">Novo ticket</h3>

        <form action="2-sorteios.php" method="post" class="flex items-center gap-4">
          <input type="hidden" name="new_ticket" value="true">
          <?php
          echo '<input type="hidden" name="gambler_cpf" value="' . $gambler->getCpf() . '">';
          ?>
          <div class="flex flex-col">
            <label class="text-lg font-semibold" for="sorteios">Sorteio:</label>
            <select name="sorteios" class="bg-slate-500 p-2 w-32">
              <?php
              foreach ($sorteios as $sorteio) {
                echo '<option value="' . $sorteio['id'] . '"> Sorteio: ' . $sorteio['id'] . '</option>';
              }
              ?>
            </select>
          </div>

          <div class="self-stretch flex flex-col">
            <p class="text-lg font-semibold">Números apostados:</p>
            <div class="flex gap-1 flex-grow">
              <?php
              for ($i = 0; $i < 6; $i++) {
                echo '<input type="number" name="ticket_n' . $i . '" value="0" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-16 text-center font-black">';
              }
              ?>
            </div>
          </div>

          <button class="self-end bg-black text-white font-bold rounded-md py-2 px-3" type="submit">
            Novo Ticket
          </button>
        </form>
      </div>

      <div class="">
        <h3 class="text-xl font-bold pb-2">Tickets</h3>
        <div class="grid grid-cols-4 grid-flow-row gap-4">
          <?php
          $tickets = $ticketDAO->read();

          foreach ($tickets as $ticket) {
            echo '<div class="bg-slate-900 text-white min-w-72 px-5 py-2 flex flex-col gap-1">';
            echo '<h4 class="text-black bg-white font-semibold">ID: ' . $ticket['id'] . '</h4>';
            echo '<p>Sorteio: ' . $ticket['sorteio'] . '</p>';

            $apostados = $ticket['numeros_apostados'];
            $apostados = explode(",", $apostados);
            $apostados = implode(", ", $apostados);
            echo '<p>Apostados: ' . $apostados . '</p>';

            $ticket_sorteio = $sorteioDAO->readById($ticket['sorteio']);
            $sorteados = $ticket_sorteio->getSorteados();
            $sorteados = implode(", ", $sorteados);
            echo '<p>Sorteados: ' . $sorteados . '</p>';

            // echo '<p class="text-yellow-400 bg-green-950 py-2 mb-3 font-black text-xl text-center">Resultado: ' . $ticket['resultado'] . '</p>';
            echo '</div>';
          }
          ?>

        </div>

      </div>

    </div>
  </section>
</body>

</html>