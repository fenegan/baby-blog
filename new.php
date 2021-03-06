<?php
require('init.php');
$title_article = '';
$content = '';
if (isset($_POST['title']) && isset($_POST['content']))
{
    $title_article = htmlentities($_POST['title']);
    $content = htmlentities($_POST['content']);
    //$link = mysqli_connect('localhost', 'root', '', 'babyblog');
    //$link = mysqli_connect('localhost', 'root', 'root', 'babyblog');
    $q = "INSERT INTO `posts` (`id`, `title`, `content`) VALUES (NULL, ?, ?)";
    $stmt = mysqli_prepare($link, $q);
    mysqli_stmt_bind_param($stmt, 'ss', $title_article, $content);
    mysqli_stmt_execute($stmt);
    //die($q);
    //mysqli_query($link, $q);

    header('Location: index.php');
    exit();
}

$title = "Create article";

ob_start();
?>
<div class="col">
    <form action="new.php" method="POST">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= $title_article ?>">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control"><?= $content ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Post</button>
    </form>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();

require('layout.php');
