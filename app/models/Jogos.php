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

    $query = 'SELECT jogo.id, jogo.nome, GROUP_CONCAT(genero.nome ORDER BY genero.nome SEPARATOR ", ") AS Generos, jogo.ano_lancamento , publicadora.nome AS nome_publicadora FROM jogo JOIN jogo_genero ON jogo.id = jogo_genero.id_jogo JOIN genero ON jogo_genero.id_genero = genero.id JOIN publicadora ON jogo.id_publicadora = publicadora.id GROUP BY jogo.id;';



    $response = $conn->execQuery($query, []);
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