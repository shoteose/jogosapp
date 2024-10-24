<?php
use app\core\Controller;
class Genero extends Controller {
  /**
  * Invocação da view index.php
  */
  public function index() {
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
  public function get($id = null) {
    if (is_numeric($id)) {
      $Generos = $this->model('Generos');
      $data = $Generos::findGeneroById($id);
      $this->view('genero/get', ['generos' => $data]);
    } else {
       $this->pageNotFound();
    }
  }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes
?>