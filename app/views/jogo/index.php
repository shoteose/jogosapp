<?php 
// debug
/* echo "<pre>";
print_r($data);
echo "</pre>"; */
echo "<ul>";
foreach ($data['jogos'] as $jogo) {
  // echo '<li>' . $movie['title'] . ' <a href="./movie/get/' . $movie['id']  . '">Ver +</a></li>';
  echo '<li>' . $jogo['nome'] . ' » ' . $jogo['ano_lancamento'] . ' <a href="./jogo/get/' . $jogo['id']  . '">Ver +</a></li>';
}
echo "<ul>";
?>