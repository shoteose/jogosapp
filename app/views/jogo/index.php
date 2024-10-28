<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem de Jogos</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container my-5">
    <h1 class="text-center mb-4">Listagem de Jogos</h1>

    <div class="table-responsive">
      <table class="table table-info table-striped w-75 mx-auto">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Ano de Lançamento</th>
            <th>Publicadora</th>
            <th>Detalhes</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach ($data['jogos'] as $jogo) {
            echo "<tr>";
            echo "<td>" . $jogo['id'] . "</td>";
            echo "<td>" . $jogo['nome'] . "</td>";
            echo "<td>" . $jogo['ano_lancamento'] . "</td>";
            echo "<td>Por fazer...</td>";
            echo "<td><a href='./jogo/get/" . $jogo['id'] . "' class='text-light'><img class='icon' src='assets/olho.png'></a></td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNgyH6KEfElwpcl5EiyJ3jShkn1AM2YuDhCfwfBBDFqz9EufPDA6wH8LusnaGG+"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG81r6Qq8ZTfC2m5K68K2a8a6w5VjE55rHRFVLM7xk3I6ABe9I1F2BY9HBr"></script>
</body>

</html>
