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
  <h1>O filme não existe na nossa base de dados...</h1>
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
  echo "IMDB: " . $data['jogos'][0]['ano_lancamento'];
  ?>
  </div>

  <div>
  <?php
  echo "Ano: " . $data['jogos'][0]['id_publicadora'];
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