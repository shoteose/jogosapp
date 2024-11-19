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

    if ($_SESSION['user_id_acess'] == 1) {

      // carrega os modelos necessários
      $Jogos = $this->model('Jogos');
      $Generos = $this->model('Generos');
      $Publicadoras = $this->model('Publicadoras');

      // verifica se recebeu um post no if, se não devolve a view para o formulário
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // verifica se uma imagem foi enviada no campo 'caminho_imagem' e se não teve erro no upload
        if (isset($_FILES['caminho_imagem']) && $_FILES['caminho_imagem']['error'] === UPLOAD_ERR_OK) {

          // vai vuscar o nome original da foto
          $imagem_nome = $_FILES['caminho_imagem']['name'];

          // caminho temporário da imagem no servidor
          $imagem_tmp = $_FILES['caminho_imagem']['tmp_name'];

          // defino o caminho final da imagem
          $destino = 'assets/logos/' . $imagem_nome;

          // move a iamegm do local temporário para o destino final
          if (move_uploaded_file($imagem_tmp, $destino)) {

            // caso mova com sucesso, crio um array com os dados do novo jogo
            $novoJogo = [
              'nome' => $_POST['nome'], // nome do jogo enviado pelo formulário
              'ano_lancamento' => $_POST['ano_lancamento'], // ano de lançamento
              'id_publicadora' => $_POST['id_publicadora'], // id da publicadora associada
              'caminho_imagem' => $imagem_nome, // nome da imagem
              'id_generos' => $_POST['id_generos'] // generos associados ao jogo
            ];

            // adiciona o novo jogo à base de dados utilizando o método addJogo do modelo Jogos
            $info = $Jogos::addJogo($novoJogo);

            // redireciona para a página dos jogos
            header("Location: /jogosapp/jogo");
            exit(); // bye bye, nao rola mais 
          }
        }
      } else {

        // vai buscar os generos
        $generos = $Generos::getAllGeneros();

        // vai buscar as publicadoras
        $publicadoras = $Publicadoras::getAllPublicadoras();

        // devolve a view de criar com os dados das publciadoras e dos generos
        $this->view('jogo/create', ['publicadoras' => $publicadoras, 'generos' => $generos]);
      }

    }else {
      header("Location: /jogosapp/jogo");
    }
  }



  public function update($id = null)
  {

    if ($_SESSION['user_id_acess'] == 1) {

      // se receber o metodo post entra no if, se não devolve a view com os dados do jogo e das publiucadores e generos
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
        // a imagem final é a imagem nova sempre que a imagem nova tem valor, se for null conta como false e então fica com o valor da imagem atual
        $imagem_final = $imagem_nova ?: $imagem_atual;

        if ($imagem_nova) {

          $imagem_tmp = $_FILES['caminho_imagem_novo']['tmp_name'];
          $destino = 'assets/logos/' . $imagem_final;

          // Move o arquivo para a pasta do projeto
          if (move_uploaded_file($imagem_tmp, $destino)) {
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
    } else {
      header("Location: /jogosapp/jogo");
    }
  }

  public function delete($id = null)
  {
    if ($_SESSION['user_id_acess'] == 1) {

      if (is_numeric($id)) {
        $Jogos = $this->model('Jogos');
        $data = $Jogos::deleteJogo($id);
        header("Location: /jogosapp/jogo");
        exit();
      } else {
        $this->pageNotFound();
      }
    } else {
      header("Location: /jogosapp/jogo");
    }
  }
  
}


// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes
