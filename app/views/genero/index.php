<?php 
// debug
/* echo "<pre>";
print_r($data);
echo "</pre>"; */
echo "<ul>";
foreach ($data['generos'] as $genero) {
  // echo '<li>' . $movie['title'] . ' <a href="./movie/get/' . $movie['id']  . '">Ver +</a></li>';
  echo '<li>' . $genero['nome'] . ' » ' . ' <a href="./genero/get/' . $genero['id']  . '">Ver +</a></li>';
}
echo "<ul>";
?>