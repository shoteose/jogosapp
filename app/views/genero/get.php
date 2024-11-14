<?php 
  session_start();
  $_SESSION['genero'] = $data['generos'][0]['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem de Jogos</title>
  <link rel="stylesheet" href="<?php echo $url_alias; ?>/assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>
  <div class="container my-5">
    <?php if (count($data['generos']) == 0) { ?>
      <h1>O género não existe na nossa base de dados...</h1>
    <?php } else { ?>
      <div>
        <?php echo "<h1 class=\"text-center mb-4\">Listagem de Jogos com o Genero " . $data['generos'][0]['nome'] . "</h1>"?>
      </div>
    <?php } ?>

    <div class="d-flex justify-content-between mb-3">
    <a href="<?php echo $url_alias; ?>/genero" class="btn btn-secondary btn-sm">Voltar</a>
    </div>

    <div class="album">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="jogosList">
          <?php
          foreach ($data['jogos'] as $jogo) {
            echo '<div class="col jogo-item">';
            echo '<div class="card bg-dark shadow-sm h-100">';

            echo '<div style="height: 225px; display: flex; align-items: center; justify-content: center; overflow: hidden;">';
            echo '<img src="'. $url_alias .'/assets/logos/' . $jogo['caminho_imagem'] . '" class="img-fluid" style="max-height: 100%; max-width: 100%;" alt="Imagem de ' . $jogo['nome'] . '">';
            echo '</div>';

            echo '<div class="card-body d-flex flex-column">';
            echo '<h5 class="card-title jogo-nome mb-3">' . $jogo['nome'] . '</h5>';

            echo '<div class="mt-auto d-flex justify-content-between align-items-center">';
            echo '<a href="'. $url_alias .'/genero/jogo/' . $jogo['id'] . '&' . $data['generos'][0]['id'] . '" class="btn btn-sm mt-auto btn-outline-info">Ver detalhes</a>';
            echo '</div>';

            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNgyH6KEfElwpcl5EiyJ3jShkn1AM2YuDhCfwfBBDFqz9EufPDA6wH8LusnaGG+"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG81r6Qq8ZTfC2m5K68K2a8a6w5VjE55rHRFVLM7xk3I6ABe9I1F2BY9HBr"></script>
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>

</html>
