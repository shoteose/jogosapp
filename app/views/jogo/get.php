<pre>
<?php 
/* print_r($data);
echo "Testes: ";
echo count($data['movies']); */
?>
</pre>

<?php
if (count($data['jogos']) == 0) {
?>
  <h1>O jogo não existe na nossa base de dados...</h1>
<?php 
} else {
?>

  <div>
  <?php
  echo "Nome: " . $data['jogos'][0]['nome'];
  ?>
  </div>

  <div>
  <?php
  echo "Género(s): " . $data['jogos'][0]['Generos'];
  ?>
  </div>

  <div>
  <?php
  echo "Nome da Publicado: " . $data['jogos'][0]['nome_publicadora'];
  ?>
  </div>

  <div>
  <?php
  echo "Ano de Lançamento: " . $data['jogos'][0]['ano_lancamento'];
  ?>
  </div>
<?php 
}
?>


<?php
/* echo "<ul>";
foreach ($data['movies'] as $movie) {
  echo '<li>' . $movie['title'] . '</li>';
}
echo "<ul>"; */

?>