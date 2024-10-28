<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem de Jogos</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  // debug
  /* echo "<pre>";
  print_r($data);
  echo "</pre>"; */

  echo "<h1>Listagem de Jogos</h1>";
  foreach ($data['jogos'] as $jogo) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th class='id-jogo'>ID</th>";
    echo "<th class='nome-jogo'>Nome</th>";
    echo "<th class='ano-jogo'>Ano de Lançamento</th>";
    echo "<th class='publicadora-jogo'>Publicadora</th>";
    echo "<th class='mais-jogo'>Ver mais</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    echo "<tr>";
    echo "<td>" . $jogo['id'] . "</td>";
    echo "<td>" . $jogo['nome'] . "</td>";
    echo "<td>" . $jogo['ano_lancamento'] . "</td>";
    echo "<td>Por fazer...</td>";
    echo "<td><a href='./jogo/get/" . $jogo['id'] . "'>Ver mais</a></td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";
  }
  ?>
</body>

</html>
