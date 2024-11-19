<?php

use app\core\Controller;

class Contas extends Controller
{
  /**
   * Invocação da view index.php
   */
  public function index()
  {
    $contas = $this->model('Contas');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $user = [
        'email' => $_POST['email'],
        'pass' => $_POST['password']
      ];

      $conta = $contas::getContas($user);

      if (!empty($conta)) {
        
        $_SESSION['user_id_acess'] = $conta[0]['id'];

        header("Location: /jogosapp/home/index");
        exit();
      } else {

        $this->view('contas/index');
      }
    } else {
      $this->view('contas/index');
    }
  }

  public function logout(){

    session_unset();
    session_destroy();
    
    header("Location: /jogosapp/home/index");
    exit();
  }

}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes
