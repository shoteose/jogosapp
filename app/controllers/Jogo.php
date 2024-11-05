<?php

use app\core\Controller;

class Jogo extends Controller
{
  /**
   * Invocação da view index.php
   */
  public function index()
  {
    $Jogos = $this->model('Jogos'); // é retornado o model Jogos()
    $data = $Jogos::getAllJogos();
    /*
    $Movies = new Movies();
    $data = $Movies->getAllMovies();
    ------------------------------------------------------
    $Movies = "Movies";
    $data = $Movies::getAllMovies();
    */
    $this->view('jogo/index', ['jogos' => $data]);
  }

  /**
   * Invocação da view get.php
   *
   * @param  int   $id   Id. movie
   */
  public function get($id = null)
  {
    if (is_numeric($id)) {
      $Jogos = $this->model('Jogos');
      $data = $Jogos::findJogoById($id);
      $this->view('jogo/get', ['jogos' => $data]);
    } else {
      $this->pageNotFound();
    }
  }

  public function create()
  {
    $Jogos = $this->model('Jogos');
    $Generos = $this->model('Generos');
    $Publicadoras = $this->model('Publicadoras');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      if (isset($_FILES['caminho_imagem']) && $_FILES['caminho_imagem']['error'] === UPLOAD_ERR_OK) {
        $imagem_nome = $_FILES['caminho_imagem']['name'];
        $imagem_tmp = $_FILES['caminho_imagem']['tmp_name'];
        $destino = 'assets/logos/' . $imagem_nome;

        if (move_uploaded_file($imagem_tmp, $destino)) {
          $novoJogo = [
            'nome' => $_POST['nome'],
            'ano_lancamento' => $_POST['ano_lancamento'],
            'id_publicadora' => $_POST['id_publicadora'],
            'caminho_imagem' => $imagem_nome,
            'id_generos' => $_POST['id_generos']
          ];

          $info = $Jogos::addJogo($novoJogo);
          $data = $Jogos::getAllJogos();
          header("Location: /jogosapp/jogo");
          exit();
        }
      }
    } else {
      $generos = $Generos::getAllGeneros();
      $publicadoras = $Publicadoras::getAllPublicadoras();
      $this->view('jogo/create', ['publicadoras' => $publicadoras, 'generos' => $generos]);
    }
  }


  public function update($id = null)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      
      $Jogos = $this->model('Jogos');

      $id_jogo = $_POST['id'];
      $nome = $_POST['nome'];
      $ano_lancamento = $_POST['ano_lancamento'];
      $id_publicadora = $_POST['id_publicadora'];
      $generosNovos = $_POST['id_generos'] ?? [];
      $generosAntigos = explode(',', $_POST['generosAntigos']);
      $imagem_atual = $_POST['imagem_atual'];
      $imagem_nova = $_FILES['caminho_imagem_novo']['name'] ?? '';

      // OBRIGADO INTERNET POR TER DESCOBERTO ESTE OPERADOR "ELVIS"
      // Usa o operador Elvis para determinar a imagem final
      $imagem_final = $imagem_nova ?: $imagem_atual;

      if ($imagem_nova) {

        $imagem_tmp = $_FILES['caminho_imagem_novo']['tmp_name'];
        $destino = 'assets/logos/' . $imagem_final;
    
        // Move o arquivo para a pasta do projeto
        if (move_uploaded_file($imagem_tmp, $destino)) 
        {
            // És mesmo diferente? e existes mesmo no projeto?? Isso não sei mas a minha mãe diz que posso escrever assim nos comentários, ninguém os lê mesmo
            if ($imagem_atual !== $imagem_final && file_exists('assets/logos/' . $imagem_atual)) {
                unlink('assets/logos/' . $imagem_atual);
            }
        } else {
            echo "Erro ao mover a nova imagem.";
        }
    }

    
      // Assume os generos antigos caso os generosNovos estejam vazios.
      $generosFinais = $generosNovos ?: $generosAntigos;

      $jogoModificado = [
        'id' => $id_jogo,
        'nome' => $nome,
        'ano_lancamento' => $ano_lancamento,
        'id_publicadora' => $id_publicadora,
        'caminho_imagem' => $imagem_final,
        'id_generos' => $generosFinais
      ];

      $resultado = $Jogos::updateJogo($jogoModificado);

      if ($resultado) {
        header("Location: /jogosapp/jogo");
        exit;
      } else {
        echo "Erro ao atualizar o jogo.";
      }
    } else {
      $Jogos = $this->model('Jogos');
      $Generos = $this->model('Generos');
      $Publicadoras = $this->model('Publicadoras');

      $data = $Jogos::getJogoById($id);
      $generos = $Generos::getAllGeneros();
      $publicadoras = $Publicadoras::getAllPublicadoras();
      $this->view('jogo/update', ['jogos' => $data, 'publicadoras' => $publicadoras, 'generos' => $generos]);
    }
  }

  public function delete($id = null)
  {
    if (is_numeric($id)) {
      $Jogos = $this->model('Jogos');
      $data = $Jogos::deleteJogo($id);
      header("Location: /jogosapp/jogo");
      exit();
    } else {
      $this->pageNotFound();
    }
  }
}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes
