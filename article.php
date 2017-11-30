<?php
$id = $_GET['id'];
$link = mysqli_connect('localhost', 'babyblog', 'toto42', 'babyblog');
$result = mysqli_query($link, 'SELECT * FROM posts WHERE id = '.$id);
$article = mysqli_fetch_assoc($result);

$title = $article['title'];

ob_start();
?>
<article class="col">
    <h2><?= $article['title'] ?></h2>
    <div><?= nl2br($article['content']) ?></div>
</article>
<?php
$content = ob_get_contents();
ob_end_clean();

require('layout.php');
