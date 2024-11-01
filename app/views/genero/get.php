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

    <div class="album py-3 bg-light">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php foreach ($data['jogos'] as $jogo) { ?>
            <div class="col">
              <div class="card shadow-sm h-100">
                <div style="height: 225px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                  <img src="<?php echo $url_alias; ?>/assets/logos/<?php echo $jogo['caminho_imagem']; ?>" class="img-fluid" style="max-height: 100%; max-width: 100%;" alt="Imagem de <?php echo $jogo['nome']; ?>">
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $jogo['nome']; ?></h5>
                  <p class="card-text"><strong>Ano de Lançamento:</strong> <?php echo $jogo['ano_lancamento']; ?></p>
                  <p class="card-text"><strong>Publicadora:</strong> <?php echo $jogo['nome_publicadora']; ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNgyH6KEfElwpcl5EiyJ3jShkn1AM2YuDhCfwfBBDFqz9EufPDA6wH8LusnaGG+"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG81r6Qq8ZTfC2m5K68K2a8a6w5VjE55rHRFVLM7xk3I6ABe9I1F2BY9HBr"></script>
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>

</html>
