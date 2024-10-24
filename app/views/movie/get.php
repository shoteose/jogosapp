<pre>
<?php 
/* print_r($data);
echo "Testes: ";
echo count($data['movies']); */
?>
</pre>

<?php
if (count($data['movies']) == 0) {
?>
  <h1>O filme não existe na nossa base de dados...</h1>
<?php 
} else {
?>

  <div>
  <?php
  echo "Nome: " . $data['movies'][0]['title'];
  ?>
  </div>

  <div>
  <?php
  echo "IMDB: " . $data['movies'][0]['imdb_rating'];
  ?>
  </div>

  <div>
  <?php
  echo "Ano: " . $data['movies'][0]['release_year'];
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