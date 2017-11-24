<?php
$link = mysqli_connect('localhost', 'babyblog', 'toto42', 'babyblog');
$result = mysqli_query($link, 'SELECT * FROM posts');
$data = [];
while ($row = mysqli_fetch_assoc($result))
{
    $data[] = $row;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css" />
  </head>
  <body>
    <div class="container">
        <header class="row">
            <div class="col">Hello World</div>
        </header>
        <nav class="row">
            <div class="col-2"><a href="index.php">Home</a></div>
            <div class="col-2"><a href="new.php">New article</a></div>
        </nav>
        <div id="content" class="row">
            <div class="col">
                <?php foreach ($data as $article): ?>
                <article>
                    <h2><?= $article['title'] ?></h2>
                    <div><?= $article['content'] ?></div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
        <footer class="row">
            <div class="col">
                tyvm
            </div>
        </footer>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>