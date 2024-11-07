<?php

use app\core\Controller;

class Genero extends Controller
{
  /**
   * Invocação da view index.php
   */
  public function index()
  {
    $Generos = $this->model('Generos'); // é retornado o model Generos()
    $data = $Generos::getAllGeneros();
    /*
    $Movies = new Movies();
    $data = $Movies->getAllMovies();
    ------------------------------------------------------
    $Movies = "Movies";
    $data = $Movies::getAllMovies();
    */
    $this->view('genero/index', ['generos' => $data]);
  }

  /**
   * Invocação da view get.php
   *
   * @param  int   $id   Id. movie
   */
  public function get($id = null)
  {
    if (is_numeric($id)) {
      $Generos = $this->model('Generos');
      $Jogos = $this->model('Jogos');
      $data = $Generos::findGeneroById($id);
      $jogos = $Jogos::getAllJogosByGeneroId($id);
      // $data2 = $Jogos::getAllJogos();
      $this->view('genero/get', ['generos' => $data, 'jogos' => $jogos]);
    } else {
      $this->pageNotFound();
    }
  }

  public function jogo($ids = null)
  {

    $partes = explode("&", $ids);
    $idJogo = $partes[0];
    $idGenero = $partes[1];

    if (is_numeric($idJogo) && is_numeric($idGenero)) {
      $Generos = $this->model('Generos');
      $Jogos = $this->model('Jogos');

      $data = $Generos::findGeneroById($idGenero);
      $jogos = $Jogos::getJogoById($idJogo);

      $this->view('genero/jogo', ['generos' => $data, 'jogos' => $jogos, 'idGenero' => $idGenero]);
    } else {
      $this->pageNotFound();
    }
  }

  public function create()
  {
    $Generos = $this->model('Generos');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $novoGenero = [
        'nome' => $_POST['nome']
      ];

      $info = $Generos::addGenero($novoGenero);

      header("Location: /jogosapp/genero");
      exit();
    } else {

      $this->view('genero/create', ['generos' => $Generos]);
    }
  }


  public function delete($id = null)
  {
    if (is_numeric($id)) {
      $Generos = $this->model('Generos');
      $data = $Generos::deleteGenero($id);
      header("Location: /jogosapp/genero");
      exit();
    } else {
      $this->pageNotFound();
    }
  }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes
