<!-- TODO Application entry point. Login view -->
<?php
session_start();

$msg;
if (isset($_GET['login'])) {
    $msg = 'Your login was not correct';
} else {
    $msg = '';
}

if (isset($_SESSION['name'])) {
    header('location: ./src/dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./assets/css/login.css" rel="stylesheet">
    <script src="./assets/js/index.js" type="module"></script>
</head>

<body>
    <main class="main__section">
        <form action="./src/library/loginController.php" method="POST" class="main__form">
            <input type="email" name="email" placeholder="Email" class="name__input">
            <input type="password" name="password" placeholder="Password" class="pass__input">
            <input type="submit" value="Login" class="login__input">
        </form>
        <span class="alert__span"><?= $msg ?></span>
    </main>
</body>

</html>