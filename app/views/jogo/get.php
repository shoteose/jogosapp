<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $data['jogos'][0]['jogo_nome'] ?></title>
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</head>

<body>

  <div class="form-body bg-image" style="background-image: url(../../assets/logos/<?php echo $data['jogos'][0]['caminho_imagem'] ?>)">
    <div class="row justify-content-center conteudo-jogo">
      <div class="col-md-6">
        <div class="form-holder">
          <div class="form-content p-4">
            <div class="form-items bg-dark shadow-lg mx-auto px-2 pt-3 rounded">
              <h1 class="fw-bold text-center"><?php echo $data['jogos'][0]['jogo_nome'] ?></h1>
              <form action="<?php echo $url_alias; ?>/jogo/create" method="POST" enctype="multipart/form-data">
                <div class="col-md-12 mb-3">
                  <img class="img-fluid mx-auto d-block" src="../../assets/logos/<?php echo $data['jogos'][0]['caminho_imagem'] ?>">
                </div>

                <div class="col-md-12 mb-3">
                  <label for="ano_lancamento" class="fw-bold form-label">Ano de Lançamento: </label>
                  <p><?php echo $data['jogos'][0]['ano_lancamento'] ?></p>
                </div>

                <div class="col-md-12 mb-3">
                  <label for="publicadora" class="fw-bold form-label">Nome da Publicadora: </label>
                  <p><?php echo $data['jogos'][0]['publicadora_nome'] ?></p>
                </div>

                <div class="col-md-12 mb-3">
                  <label for="publicadora" class="fw-bold form-label">País da Publicadora: </label>
                  <p><?php echo $data['jogos'][0]['publicadora_pais'] ?></p>
                </div>

                <div class="col-md-12 mb-3">
                  <label for="generos" class="fw-bold form-label">Géneros: </label>
                  <p><?php echo $data['jogos'][0]['generos'] ?></p>
                </div>

                <div class="form-button pb-3 text-center">
                  <a href="<?php echo $url_alias; ?>/jogo" class="btn btn-danger">Voltar</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>

</html>