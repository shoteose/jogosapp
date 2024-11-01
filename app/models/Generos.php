<?php

namespace app\models;

use app\core\Db;

class Generos
{
  /**
   * Método para obtenção do dataset de todos os filmes
   *
   * @return   array
   */
  public static function getAllGeneros()
  {
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
  public static function findGeneroById(int $id)
  {
    $conn = new Db();
    $response = $conn->execQuery('SELECT id, nome FROM genero WHERE id = ?', array('i', array($id)));
    return $response;
  }

  public static function addGenero($data){
    $conn = new Db();

    $response = $conn->execQuery('INSERT INTO genero (nome) VALUES (?)', array(
      's',
      array($data['nome'])
    ));
    return $response;
  }


  public static function deleteGenero($id)
  {
    $conn = new Db();

    $conn->execQuery('DELETE FROM jogo_genero WHERE id_genero = ?', array(
      'i',
      array($id)
    ));

    $response = $conn->execQuery('DELETE FROM genero WHERE id = ?', array(
      'i',
      array($id)
    ));

    return $response;
  }
}
