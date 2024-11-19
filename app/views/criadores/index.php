<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criadores</title>
  <link rel="stylesheet" href="<?php echo $url_alias ?>/assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body class="d-flex h-100 text-center text-white">
  <div class="container d-flex flex-column justify-content-center align-items-center text-center vh-100">
    <p class="line-1 anim-typewriter" id="tituloCriadores">Criadores</p>

    <div id="textosBotao">

      <div class="row textosBotao">
        <div class="col-12 d-flex flex-column align-items-center">
          <p>Paulo Novo nº25968 ECGM 3ºANO</p>
          <p>Hugo Diniz nº26824 ECGM 3ºANO</p>
          <a href="<?php echo $url_alias; ?>/" class="btn btn-md btn-custom mt-3">Voltar</a>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo $url_alias ?>/assets/js/scripts.js"></script>
</body>

</html>
