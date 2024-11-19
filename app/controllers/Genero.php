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
      // Carrega os modelos necessários
      $Generos = $this->model('Generos');
      $Jogos = $this->model('Jogos');

      $data = $Generos::findGeneroById($id);
      $jogos = $Jogos::getAllJogosByGeneroId($id);

      // devolve a view get com os genero com esse id e os jogos associados a esse genero
      $this->view('genero/get', ['generos' => $data, 'jogos' => $jogos]);
    } else {
      $this->pageNotFound();
    }
  }

  public function jogo($ids = null)
  {

    //recebe o parametro em cima como "idJogo&idGenero"
    // explode para separar a string pelo "&"
    //recebe no array n aprimeira parte o id do jogo e na segunda parte o id do genero para passar para o botao

    $partes = explode("&", $ids);
    $idJogo = $partes[0];
    $idGenero = $partes[1];
    // se ambos forem numericos
    if (is_numeric($idJogo) && is_numeric($idGenero)) {
      $Generos = $this->model('Generos');
      $Jogos = $this->model('Jogos');

      $jogos = $Jogos::getJogoById($idJogo);
      //devolve a view com o jogo e o idgenero
      $this->view('genero/jogo', ['jogos' => $jogos, 'idGenero' => $idGenero]);
    } else {
      $this->pageNotFound();
    }
  }

  public function create()
  {
    if ($_SESSION['user_id_acess'] == 1) {

      $Generos = $this->model('Generos');


    //se receber um post entra no if, se não devolve a view de criar
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $novoGenero = [
          'nome' => $_POST['nome']
        ];

        $Generos::addGenero($novoGenero);

        header("Location: /jogosapp/genero");
        exit();
      } else {

        $this->view('genero/create', ['generos' => $Generos]);
      }
    } else {
      header("Location: /jogosapp/genero");
    }
  }


  public function delete($id = null)
  {
    if ($_SESSION['user_id_acess'] == 1) {

      if (is_numeric($id)) {
        $Generos = $this->model('Generos');
        $data = $Generos::deleteGenero($id);
        header("Location: /jogosapp/genero");
        exit();
      } else {
        $this->pageNotFound();
      }
    } else {
      header("Location: /jogosapp/genero");
    }
  }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes
