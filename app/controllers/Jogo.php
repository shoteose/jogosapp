<?php

use app\core\Controller;

class Jogo extends Controller
{
  /**
   * Invocação da view index.php
   */
  public function index()
  {
    $Jogos = $this->model('Jogos'); // é retornado o model Jogos()
    $data = $Jogos::getAllJogos();
    /*
    $Movies = new Movies();
    $data = $Movies->getAllMovies();
    ------------------------------------------------------
    $Movies = "Movies";
    $data = $Movies::getAllMovies();
    */
    $this->view('jogo/index', ['jogos' => $data]);
  }

  /**
   * Invocação da view get.php
   *
   * @param  int   $id   Id. movie
   */
  public function get($id = null)
  {
    if (is_numeric($id)) {
      $Jogos = $this->model('Jogos');
      $data = $Jogos::findJogoById($id);
      $this->view('jogo/get', ['jogos' => $data]);
    } else {
      $this->pageNotFound();
    }
  }


  public function create()
  {
    $Jogos = $this->model('Jogos');
    $Generos = $this->model('Generos');
    $Publicadoras = $this->model('Publicadoras');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      if (isset($_FILES['caminho_imagem']) && $_FILES['caminho_imagem']['error'] === UPLOAD_ERR_OK) {
        $imagem_nome = $_FILES['caminho_imagem']['name'];
        $imagem_tmp = $_FILES['caminho_imagem']['tmp_name'];
        $destino = 'assets/logos/' . $imagem_nome;

        if (move_uploaded_file($imagem_tmp, $destino)) {
          $novoJogo = [
            'nome' => $_POST['nome'],
            'ano_lancamento' => $_POST['ano_lancamento'],
            'id_publicadora' => $_POST['id_publicadora'],
            'caminho_imagem' => $imagem_nome,
            'id_generos' => $_POST['id_generos']
          ];

          $info = $Jogos::addJogo($novoJogo);
          $data = $Jogos::getAllJogos();
          header("Location: /jogosapp/jogo");
          exit();
        }
      }
    } else {
      $generos = $Generos::getAllGeneros();
      $publicadoras = $Publicadoras::getAllPublicadoras();
      $this->view('jogo/create', ['publicadoras' => $publicadoras, 'generos' => $generos]);
    }
  }


  function delete($id = null)
  {
    if (is_numeric($id)) {
      $Jogos = $this->model('Jogos');
      $data = $Jogos::deleteJogo($id);
      header("Location: /jogosapp/jogo");
      exit();
    } else {
      $this->pageNotFound();
    }
  }
}




// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes
