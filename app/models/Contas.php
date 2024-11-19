<?php

namespace app\models;

use app\core\Db;

class Contas
{
  /**
   * Método para obtenção do dataset de todos os filmes
   *
   * @return   array
   */
  public static function getContas($user)
  {
    $conn = new Db();
    $response = $conn->execQuery('SELECT id, nome,email, tipo_user_id, password FROM utilizadores WHERE email = ?', array(
        's',
        array($user['email'])
      ));
    return $response;
  }

  /**
   * Método para a obtenção de um filme pelo id correspondente
   * @param    int     $id   Id. do filme
   *
   * @return   array
   */
  public static function getContaById(int $id)
  {
    $conn = new Db();
    $response = $conn->execQuery('SELECT id, email,tipo_user_id password FROM utilizadores WHERE id = ?', array('i', array($id)));
    return $response;
  }

  public static function addConta($data){
    $conn = new Db();

    $response = $conn->execQuery('INSERT INTO utilizadores (nome,email,tipo_user_id,password) VALUES (?,?,?,?)', array(
      'ssis',
      array($data['nome'],$data['email'],2,$data['password'])
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
