<pre>
<?php 
/* print_r($data);
echo "Testes: ";
echo count($data['movies']); */
?>
</pre>

<?php
if (count($data['generos']) == 0) {
?>
  <h1>O género não existe na nossa base de dados...</h1>
<?php 
} else {
?>

  <div>
  <?php
  echo "Nome do género: " . $data['generos'][0]['nome'];
  ?>
  </div>

  <div>
  <?php
  echo "ID do género: " . $data['generos'][0]['id'];
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