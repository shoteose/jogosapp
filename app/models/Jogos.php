<?php

namespace app\models;

use app\core\Db;
class Jogos {
  /**
  * Método para obtenção do dataset de todos os filmes
  *
  * @return   array
  */
  public static function getAllJogos() {
    $conn = new Db();
    $response = $conn->execQuery('SELECT id, nome, ano_lancamento FROM jogo');
    return $response;
  }

  /**
  * Método para a obtenção de um filme pelo id correspondente
  * @param    int     $id   Id. do filme
  *
  * @return   array
  */
  public static function findJogoById(int $id) {
    $conn = new Db();
    $response = $conn->execQuery('SELECT id, nome, ano_lancamento, id_publicadora FROM jogo WHERE id = ?', array('i', array($id)));
    return $response;
  }

}