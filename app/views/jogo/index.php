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

    <div class="album">
      <div class="container">
        <div class ="row">
          <a href="<?php echo $url_alias;?>/jogo/create" id="adicionar" class="btn btn-success btn-sm btn-md mb-3">Adicionar Jogo</a>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

          <?php
          foreach ($data['jogos'] as $jogo) {
            echo '<div class="col">';
            echo '<div class="card shadow-sm h-100">';

            // imagem
            echo '<div style="height: 225px; display: flex; align-items: center; justify-content: center; overflow: hidden;">';
            echo '<img src="assets/logos/' . $jogo['caminho_imagem'] . '" class="img-fluid" style="max-height: 100%; max-width: 100%;" alt="Imagem de ' . $jogo['nome'] . '">';
            echo '</div>';

            // detalhes do jogo
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $jogo['nome'] . '</h5>';
            echo '<p class="card-text"><strong>Ano de Lançamento:</strong> ' . $jogo['ano_lancamento'] . '</p>';
            echo '<p class="card-text"><strong>Publicadora:</strong> ' . $jogo['nome_publicadora'] . '</p>';
            echo '<p class="card-text"><strong>Gêneros:</strong> ' . $jogo['Generos'] . '</p>';

            // ver mais ou eliminar
            echo '<div class="mt-auto d-flex justify-content-between align-items-center">';
            echo '<a href="./jogo/get/' . $jogo['id'] . '" class="btn btn-sm btn-outline-secondary">Ver detalhes</a>';
            echo '<a href="./jogo/delete/' . $jogo['id'] . '" class="btn btn-sm btn-outline-danger">Delete</a>';
            echo '</div>';

            echo '</div>'; // Fechando card-body
            echo '</div>'; // Fechando card
            echo '</div>'; // Fechando col-md-4
          }
          ?>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNgyH6KEfElwpcl5EiyJ3jShkn1AM2YuDhCfwfBBDFqz9EufPDA6wH8LusnaGG+"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG81r6Qq8ZTfC2m5K68K2a8a6w5VjE55rHRFVLM7xk3I6ABe9I1F2BY9HBr"></script>
</body>

</html>