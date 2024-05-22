<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Loteria Santos</title>
</head>

<body class="bg-slate-900">
  <section class="min-w-full flex flex-col items-center">
    <div class="flex flex-col gap-3 items-center bg-slate-100 px-20 pt-20 h-screen">
      <div>
        <img src="https://upload.wikimedia.org/wikipedia/commons/1/15/Santos_Logo.png" alt=" Santos Logo" class="max-w-52">
      </div>

      <div>
        <form action="2-sorteios.php" method="post" class="self-center flex flex-col gap-3">
          <input type="hidden" name="new_gambler" value="true">
          <label for="name">Nome</label>
          <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg text-center text-xl">
          <label for="cpf">CPF</label>
          <input type="number" name="cpf" id="cpf" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg text-center text-xl">
          <button class="bg-black text-white font-bold rounded-md mt-5 py-2 px-3" type="submit">
            Login
          </button>
        </form>
      </div>
    </div>

  </section>

</body>

</html>