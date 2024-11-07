<?php

namespace app\models;

use app\core\Db;

class Jogos
{
  /**
   * Método para obtenção do dataset de todos os filmes
   *
   * @return   array
   */
  public static function getAllJogos(){
    $conn = new Db();

    $query = 'SELECT jogo.id, jogo.nome, 
       GROUP_CONCAT(genero.nome ORDER BY genero.nome SEPARATOR ", ") AS Generos, 
       jogo.caminho_imagem, jogo.ano_lancamento, 
       publicadora.nome AS nome_publicadora 
       FROM jogo 
       LEFT JOIN jogo_genero ON jogo.id = jogo_genero.id_jogo 
       LEFT JOIN genero ON jogo_genero.id_genero = genero.id 
       JOIN publicadora ON jogo.id_publicadora = publicadora.id 
       GROUP BY jogo.id;
';



    $response = $conn->execQuery($query, []);
    return $response;
  }

  /**
   * Método para a obtenção de um filme pelo id correspondente
   * @param    int     $id   Id. do filme
   *
   * @return   array
   */

  public static function getAllJogosByGeneroId(int $id){

    $conn = new Db();

    $query = 'SELECT jogo.id, jogo.nome, 
        genero.nome AS generos, 
        jogo.caminho_imagem, jogo.ano_lancamento, 
        publicadora.nome AS nome_publicadora 
        FROM jogo 
        LEFT JOIN jogo_genero ON jogo.id = jogo_genero.id_jogo 
        LEFT JOIN genero ON jogo_genero.id_genero = genero.id 
        JOIN publicadora ON jogo.id_publicadora = publicadora.id 
        WHERE genero.id = ' . $id . ' GROUP BY jogo.id;
    ';



    $response = $conn->execQuery($query, []);
    return $response;

  }

  public static function getAllJogosByPublicadoraId(int $id){

    $conn = new Db();

    $query = 'SELECT jogo.id, jogo.nome, 
        genero.nome AS generos, 
        jogo.caminho_imagem, jogo.ano_lancamento, 
        publicadora.nome AS nome_publicadora,
        publicadora.pais AS pais_publicadora
        FROM jogo 
        LEFT JOIN jogo_genero ON jogo.id = jogo_genero.id_jogo 
        LEFT JOIN genero ON jogo_genero.id_genero = genero.id 
        JOIN publicadora ON jogo.id_publicadora = publicadora.id 
        WHERE publicadora.id = ' . $id . ' GROUP BY jogo.id;
    ';



    $response = $conn->execQuery($query, []);
    return $response;

  }


  public static function getJogoById(int $id)
  {
    $conn = new Db();
    $response = $conn->execQuery('SELECT 
    Jogo.id AS jogo_id,
    Jogo.nome AS jogo_nome,
    Jogo.ano_lancamento,
    Jogo.caminho_imagem,
    Publicadora.nome AS publicadora_nome,
    Publicadora.id AS publicadora_id,
    GROUP_CONCAT(Genero.id) AS generos_id,
    GROUP_CONCAT(Genero.nome SEPARATOR ", ") AS generos_nome
    FROM 
        Jogo
    LEFT JOIN 
        Publicadora ON Jogo.id_publicadora = Publicadora.id
    LEFT JOIN 
        Jogo_Genero ON Jogo.id = Jogo_Genero.id_jogo
    LEFT JOIN 
        Genero ON Jogo_Genero.id_genero = Genero.id
    WHERE 
        Jogo.id = ?
    ', array('i', array($id)));
    return $response;
  }

  public static function findJogoById(int $id)
  {
    $conn = new Db();
    $response = $conn->execQuery('SELECT 
    Jogo.id AS jogo_id,
    Jogo.nome AS jogo_nome,
    Jogo.ano_lancamento,
    Jogo.caminho_imagem,
    Publicadora.nome AS publicadora_nome,
    Publicadora.pais AS publicadora_pais,
    Publicadora.id AS publicadora_id,
    GROUP_CONCAT(Genero.nome SEPARATOR ", ") AS generos
    FROM 
        Jogo
    LEFT JOIN 
        Publicadora ON Jogo.id_publicadora = Publicadora.id
    LEFT JOIN 
        Jogo_Genero ON Jogo.id = Jogo_Genero.id_jogo
    LEFT JOIN 
        Genero ON Jogo_Genero.id_genero = Genero.id
    WHERE 
        Jogo.id = ?
    GROUP BY 
    Jogo.id, Jogo.nome, Jogo.ano_lancamento, Publicadora.nome, Publicadora.pais;
    ', array('i', array($id)));
    return $response;
  }

  public static function addJogo($data){
    $conn = new Db();

    $response = $conn->execQuery('INSERT INTO jogo (nome, ano_lancamento, id_publicadora, caminho_imagem) VALUES (?, ?, ?, ?)', array(
      'siis',
      array($data['nome'], $data['ano_lancamento'], $data['id_publicadora'], $data['caminho_imagem'])
    ));

    $resultado = $conn->execQuery('SELECT id FROM jogo WHERE nome = ? AND ano_lancamento = ?', array(
      'si',
      array($data['nome'], $data['ano_lancamento'])
    ));
    $jogoId = $resultado[0]['id'];

    if (empty($result)) {
        echo "ID não encontrado!";
    } else {
        $jogoId = $result[0]['id'];
    }

    foreach ($data['id_generos'] as $generoId) {
      $conn->execQuery('INSERT INTO jogo_genero (id_jogo, id_genero) VALUES (?, ?)', array(
        'ii',
        array($jogoId, $generoId)
      ));
    }

    return $response;
  }

  public static function updateJogo($data)
  {
      $conn = new Db();
  
      $response = $conn->execQuery('UPDATE jogo SET nome = ?, ano_lancamento = ?, id_publicadora = ?, caminho_imagem = ? WHERE id = ?', array(
          'siisi',
          array($data['nome'], $data['ano_lancamento'], $data['id_publicadora'], $data['caminho_imagem'], $data['id'])
      ));
  
      $jogoId = $data['id'];
  
      $conn->execQuery('DELETE FROM jogo_genero WHERE id_jogo = ?', array('i', array($jogoId)));
  
      foreach ($data['id_generos'] as $generoId) {
          $conn->execQuery('INSERT INTO jogo_genero (id_jogo, id_genero) VALUES (?, ?)', array(
              'ii',
              array($jogoId, $generoId)
          ));
      }
  
      return $response;
  }
  
  public static function deleteJogo($id)
  {
    $conn = new Db();

    $jogo = $conn->execQuery('SELECT caminho_imagem FROM jogo WHERE id = ?', array(
      'i',
      array($id)
    ));

    if (!empty($jogo) && file_exists('assets/logos/' . $jogo[0]['caminho_imagem'])) {

      unlink('assets/logos/' . $jogo[0]['caminho_imagem']);
    }

    $conn->execQuery('DELETE FROM jogo_genero WHERE id_jogo = ?', array(
      'i',
      array($id)
    ));
    $response = $conn->execQuery('DELETE FROM jogo WHERE id = ?', array(
      'i',
      array($id)
    ));
    return $response;
  }
}
