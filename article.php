<?php
require('init.php');
$id = $_GET['id'];

$message = '';
if (isset($_POST['message']))
{
    $message = htmlentities($_POST['message']);
    $q = "INSERT INTO `comments` (`id`, `post_id`, `message`) VALUES (NULL, '".$id."', '".$message."')";
    mysqli_query($link, $q);
    
    header('Location: article.php?id='.$id);
    exit();
}

$result = mysqli_query($link, 'SELECT * FROM posts WHERE id = '.$id);
$article = mysqli_fetch_assoc($result);

$result = mysqli_query($link, 'SELECT * FROM comments WHERE post_id = '.$id);
$comments = [];
while ($row = mysqli_fetch_assoc($result))
{
    $comments[] = $row;
}

$title = $article['title'];

ob_start();
?>
<div class="col">
<article>
    <h2><?= $article['title'] ?></h2>
    <div><?= nl2br($article['content']) ?></div>
</article>
<hr>
<h3>Comments</h3>
<div id="comments">
    <?php foreach ($comments as $comment): ?>
    <div class="comment">
        <p class="message"><?= $comment['message'] ?></p>
    </div>
    <?php endforeach; ?>
</div>
<form action="article.php?id=<?= $id ?>" method="POST">
    <div class="form-group">
        <label for="message"></label>
        <textarea name="message" id="message" class="form-control"></textarea>
    </div>
    <input type="submit" value="Submit" class="btn btn-primary" />
</form>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();

require('layout.php');
