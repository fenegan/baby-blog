<?php
require('init.php');
$username = '';
$password = '';
if (!empty($_POST['username']) && !empty($_POST['password']))
{
    $username = htmlentities($_POST['username']);
    $password = $_POST['password'];
    
    $q = "SELECT * FROM users WHERE password = '". $password . "' AND username = '" . $username . "'";
    $result = mysqli_query($link, $q);
    $user = mysqli_fetch_assoc($result);

    if ($user === NULL)
    {
        $errors[] = 'Invalid username or password';
    }
    else
    {
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
    }
    
    header('Location: index.php');
    exit();
}

$title = "Login";

ob_start();
?>
<div class="col">
    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= $title_article ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" value="<?= $title_article ?>">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();

require('layout.php');
