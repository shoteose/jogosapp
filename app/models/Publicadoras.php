<?php

namespace app\models;

use app\core\Db;
class Publicadoras {
  /**
  * Método para obtenção do dataset de todos os filmes
  *
  * @return   array
  */
  public static function getAllPublicadoras() {
    $conn = new Db();
    $response = $conn->execQuery('SELECT id, nome, pais FROM publicadora');
    return $response;
  }

  /**
  * Método para a obtenção de um filme pelo id correspondente
  * @param    int     $id   Id. do filme
  *
  * @return   array
  */
  public static function findPublicadoraById(int $id) {
    $conn = new Db();
    $response = $conn->execQuery('SELECT id, nome, pais FROM publicadora WHERE id = ?', array('i', array($id)));
    return $response;
  }

}