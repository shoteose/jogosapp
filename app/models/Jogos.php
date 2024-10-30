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
  public static function getAllJogos()
  {
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
  public static function findJogoById(int $id)
  {
    $conn = new Db();
    $response = $conn->execQuery('SELECT 
    Jogo.id AS jogo_id,
    Jogo.nome AS jogo_nome,
    Jogo.ano_lancamento,
    Publicadora.nome AS publicadora_nome,
    Publicadora.pais AS publicadora_pais,
    GROUP_CONCAT(Genero.nome SEPARATOR ", ") AS generos
FROM 
    Jogo
JOIN 
    Publicadora ON Jogo.id_publicadora = Publicadora.id
JOIN 
    Jogo_Genero ON Jogo.id = Jogo_Genero.id_jogo
JOIN 
    Genero ON Jogo_Genero.id_genero = Genero.id
WHERE 
    Jogo.id = ?
GROUP BY 
    Jogo.id, Jogo.nome, Jogo.ano_lancamento, Publicadora.nome, Publicadora.pais;
', array('i', array($id)));
    return $response;
  }


  public static function addJogo($data)
  {
    $conn = new Db();
    $response = $conn->execQuery('INSERT INTO jogo (nome, ano_lancamento, id_publicadora, caminho_imagem) VALUES (?, ?, ?, ?)', array(
      'ssis',
      array($data['nome'], $data['ano_lancamento'], $data['id_publicadora'], $data['caminho_imagem'])
    ));
    return $response;
  }
}
