<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $title; ?></title>
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
            <div class="col">Hello World Blog - <?= $title ?></div>
        </header>
        <nav class="row">
            <div class="col-2"><a href="index.php">Home</a></div>
            <div class="col-2"><a href="new.php">New article</a></div>
            <div class="col-2">
                <?php if (!isset($_SESSION['username'])): ?>
                <a href="register.php">Register</a>
                <?php endif; ?>
            </div>
            <div class="col-2"></div>
            <div class="col-2">
                <?php if (isset($_SESSION['username'])): ?>
                <a href="logout.php">Logout</a>
                <?php else: ?>
                <a href="login.php">Login</a>
                <?php endif; ?>
            </div>
            <div class="col-2">
                <?php if (isset($_SESSION['username'])): ?>
                Logged in as <?= $_SESSION['username'] ?>
                <?php else: ?>
                Not logged in
                <?php endif; ?>
            </div>
        </nav>
        <div id="content" class="row">
            <?php echo $content; ?>
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
