<?php

use app\core\Controller;

class Criadores extends Controller
{
  /**
   * Invocação da view index.php
   */
  public function index()
  {

    $this->view('criadores/index', []);
  }

}