<?php
require('init.php');
$result = mysqli_query($link, 'SELECT * FROM posts ORDER BY id DESC');
$data = [];
while ($row = mysqli_fetch_assoc($result))
{
    $data[] = $row;
}

$title = "Home";

ob_start();
?>
<div class="col-12"><h1>Articles</h1></div>
<div class="col">
    <?php foreach ($data as $article): ?>
    <article>
        <h2><a href="article.php?id=<?= $article['id'] ?>"><?= $article['title'] ?></a></h2>
        <div><?= nl2br($article['content']) ?></div>
    </article>
    <hr>
    <?php endforeach; ?>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();

require('layout.php');
