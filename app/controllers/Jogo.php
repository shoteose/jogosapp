<?php
use app\core\Controller;
class Jogo extends Controller {
  /**
  * Invocação da view index.php
  */
  public function index() {
    $Jogos = $this->model('Jogos'); // é retornado o model Movies()
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
  public function get($id = null) {
    if (is_numeric($id)) {
      $Movies = $this->model('Jogos');
      $data = $Movies::findJogoById($id);
      $this->view('jogo/get', ['jogos' => $data]);
    } else {
       $this->pageNotFound();
    }
  }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes
?>