<?php

use app\core\Controller;

class Home extends Controller
{
  public function index()
  {
    $contass = $this->model('Contas');

    // existe user?
    if (isset($_SESSION['user_id'])) {

      $userId = $_SESSION['user_id'];
      $conta = $contass::getContaById($userId);

      $this->view('home/index', ['user' => $conta]);
    }

    $this->view('home/index');
  }
}
