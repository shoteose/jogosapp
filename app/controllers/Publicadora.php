<?php

use app\core\Controller;

class Publicadora extends Controller
{
  /**
   * Invocação da view index.php
   */
  public function index()
  {
    $publicadoras = $this->model('Publicadoras'); // é retornado o model Publicadora()
    $data = $publicadoras::getAllPublicadoras();
    /*
    $Movies = new Movies();
    $data = $Movies->getAllMovies();
    ------------------------------------------------------
    $Movies = "Movies";
    $data = $Movies::getAllMovies();
    */
    $this->view('publicadora/index', ['publicadoras' => $data]);
  }

  /**
   * Invocação da view get.php
   *
   * @param  int   $id   Id. movie
   */
  public function get($id = null)
  {
    if (is_numeric($id)) {
      $publicadoras = $this->model('Publicadoras');
      $Jogos = $this->model('Jogos');
      $data = $publicadoras::findPublicadoraById($id);
      $jogos = $Jogos::getAllJogosByPublicadoraId($id);
      // $data2 = $Jogos::getAllJogos();
      $this->view('publicadora/get', ['publicadoras' => $data, 'jogos' => $jogos]);
    } else {
      $this->pageNotFound();
    }
  }

  public function jogo($id =null){
    if (is_numeric($id)) {
      $Jogos = $this->model('Jogos');
      $data = $Jogos::findJogoById($id);
      $this->view('publicadora/jogo', ['jogos' => $data]);
    } else {
      $this->pageNotFound();
    }
  }

  public function create()
  {
    $publicadoras = $this->model('Publicadoras');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $novopublicadora=[
        'nome' => $_POST['nome'],
        'pais' => $_POST['pais']
      ];

      $info = $publicadoras::addPublicadora($novopublicadora);

      header("Location: /jogosapp/publicadora");
      exit();
    }else{

      $this->view('publicadora/create', ['publicadoras' => $publicadoras]);
    }
  }


  public function delete($id = null)
  {
    if (is_numeric($id)) {
      $publicadoras = $this->model('Publicadoras');
      $data = $publicadoras::deletePublicadora($id);
      header("Location: /jogosapp/publicadora");
      exit();
    } else {
      $this->pageNotFound();
    }
  }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes
