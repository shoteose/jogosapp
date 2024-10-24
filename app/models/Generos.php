<?php

namespace app\models;

use app\core\Db;
class Generos {
  /**
  * Método para obtenção do dataset de todos os filmes
  *
  * @return   array
  */
  public static function getAllGeneros() {
    $conn = new Db();
    $response = $conn->execQuery('SELECT id, nome FROM genero');
    return $response;
  }

  /**
  * Método para a obtenção de um filme pelo id correspondente
  * @param    int     $id   Id. do filme
  *
  * @return   array
  */
  public static function findGeneroById(int $id) {
    $conn = new Db();
    $response = $conn->execQuery('SELECT id, nome FROM genero WHERE id = ?', array('i', array($id)));
    return $response;
  }

}