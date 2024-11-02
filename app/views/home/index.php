<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>GamesList</title>

</head>

<body id="index">

  <div class="container text-games text-center">
    <div class="row">
      <div class="col-12">
        <p class="line-1 anim-typewriter" id="tituloIndex">GamesList</p>
      </div>
    </div>
    <div class="row mt-3" id="botoes">
      <div class="col-12 ms-5 d-flex flex-column align-items-center">
        <a href="<?php echo $url_alias;?>/jogo" class="btn btn-info btn-md btn-custom">Ver jogos</a>
        <a href="<?php echo $url_alias;?>/genero" class="btn btn-info btn-md btn-custom">Ver Gêneros</a>
        <a href="<?php echo $url_alias;?>/home/criadores" class="btn btn-info btn-md btn-custom">Ver Criadores</a>
      </div>
    </div>
  </div>  


  <script src="assets/js/scripts.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body>

</html>
