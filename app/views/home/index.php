<?php if (!isset($_SESSION['user_id_acess'])) {?>

  <!doctype html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $url_alias ?>/assets/css/style.css">
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
        <div class="d-flex flex-column">
          <a href="<?php echo $url_alias; ?>/contas" class="btn btn-md btn-custom mb-2">Login</a>
          <a href="<?php echo $url_alias; ?>/jogo" class="btn btn-md btn-custom mb-2">Ver Jogos</a>
          <a href="<?php echo $url_alias; ?>/genero" class="btn btn-md btn-custom mb-2">Ver Gêneros</a>
          <a href="<?php echo $url_alias; ?>/publicadora" class="btn btn-md btn-custom mb-2">Ver Publicadoras</a>
          <a href="<?php echo $url_alias; ?>/criadores" class="btn btn-md btn-custom mb-2">Ver Criadores</a>
        </div>
      </div>
    </div>


    <!-- Scripts -->
    <script src="<?php echo $url_alias ?>/assets/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>
  </body>


  </html>

<?php } else { ?>

  <!doctype html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $url_alias ?>/assets/css/style.css">
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
        <div class="d-flex flex-column">
          <a href="<?php echo $url_alias; ?>/contas/logout" onclick="logout()" class="btn btn-md btn-custom mb-2">Logout</a>
          <a href="<?php echo $url_alias; ?>/jogo" class="btn btn-md btn-custom mb-2">Ver Jogos</a>
          <a href="<?php echo $url_alias; ?>/genero" class="btn btn-md btn-custom mb-2">Ver Gêneros</a>
          <a href="<?php echo $url_alias; ?>/publicadora" class="btn btn-md btn-custom mb-2">Ver Publicadoras</a>
          <a href="<?php echo $url_alias; ?>/criadores" class="btn btn-md btn-custom mb-2">Ver Criadores</a>

        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo $url_alias ?>/assets/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>
  </body>


  </html>

<?php } ?>