<?php if (isset($_SESSION['user_id_acess']) && $_SESSION['user_id_acess'] == 1) { ?>

  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem de Gêneros</title>
  <link rel="stylesheet" href="<?php echo $url_alias; ?>/assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>
  <div class="container my-5">
    <h1 class="text-center mb-4">Listagem de Gêneros</h1>

    <div class="d-flex flex-wrap justify-content-between mb-3">
      <a href="<?php echo $url_alias; ?>/" class="btn btn-secondary btn-sm mb-2">Voltar</a>
      <a href="<?php echo $url_alias; ?>/genero/create" class="btn btn-success btn-sm mb-2">Adicionar Gênero</a>
    </div>

    <div class="list-group">
      <?php foreach ($data['generos'] as $genero) { ?>
        <div class="bg-dark list-group-item d-flex justify-content-between align-items-center">
          <span><?php echo $genero['nome']; ?></span>
          <div>
            <a href="<?php echo $url_alias; ?>/genero/get/<?php echo $genero['id']; ?>" class="btn btn-sm btn-outline-secondary me-2">Ver Jogos</a>
            <a data-bs-toggle="modal" data-bs-target="#modalEliminarGe" data-id="<?php echo $genero['id']; ?>" class="btn btn-sm btn-outline-danger">Apagar género</a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <!-- Modal de Eliminar -->
  <div class="modal fade" id="modalEliminarGe" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEliminarLabel">Confirmar Eliminação</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Tem certeza que deseja eliminar este Genero?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger" onclick="deleteGenero()">Eliminar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNgyH6KEfElwpcl5EiyJ3jShkn1AM2YuDhCfwfBBDFqz9EufPDA6wH8LusnaGG+"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG81r6Qq8ZTfC2m5K68K2a8a6w5VjE55rHRFVLM7xk3I6ABe9I1F2BY9HBr"></script>
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="<?php echo $url_alias ?>/assets/js/scriptsGe.js"></script>
</body>

</html>


<?php } else { ?>

  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem de Gêneros</title>
  <link rel="stylesheet" href="<?php echo $url_alias; ?>/assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>
  <div class="container my-5">
    <h1 class="text-center mb-4">Listagem de Gêneros</h1>

    <div class="d-flex flex-wrap justify-content-between mb-3">
      <a href="<?php echo $url_alias; ?>/" class="btn btn-secondary btn-sm mb-2">Voltar</a>
    </div>

    <div class="list-group">
      <?php foreach ($data['generos'] as $genero) { ?>
        <div class="bg-dark list-group-item d-flex justify-content-between align-items-center">
          <span><?php echo $genero['nome']; ?></span>
          <div>
            <a href="<?php echo $url_alias; ?>/genero/get/<?php echo $genero['id']; ?>" class="btn btn-sm btn-outline-secondary me-2">Ver Jogos</a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNgyH6KEfElwpcl5EiyJ3jShkn1AM2YuDhCfwfBBDFqz9EufPDA6wH8LusnaGG+"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG81r6Qq8ZTfC2m5K68K2a8a6w5VjE55rHRFVLM7xk3I6ABe9I1F2BY9HBr"></script>
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="<?php echo $url_alias ?>/assets/js/scriptsGe.js"></script>
</body>

</html>


<?php } ?>
