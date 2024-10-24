<?php 
// debug
/* echo "<pre>";
print_r($data);
echo "</pre>"; */
echo "<ul>";
foreach ($data['movies'] as $movie) {
  // echo '<li>' . $movie['title'] . ' <a href="./movie/get/' . $movie['id']  . '">Ver +</a></li>';
  echo '<li>' . $movie['title'] . ' » ' . $movie['imdb_rating'] . ' <a href="./movie/get/' . $movie['id']  . '">Ver +</a></li>';
}
echo "<ul>";
?>