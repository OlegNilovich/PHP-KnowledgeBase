<?php
session_start();

$login = 'admin';
$password = '$2y$10$P/WRWP76YiaFug13Hag5oOcL.JY0zGOJFWfkWdmtjnvkcl8vbsNiS';
$p_hash = password_hash("123", PASSWORD_DEFAULT);

if (!empty($_POST)) {
  if ($_POST['login'] == $login && password_verify($_POST['password'], $password)) {
    $_SESSION['auth'] = $_POST['login'];
    $_SESSION['result'] = 'Login Success';
    header("Location: secret.php");
    die;
  } else {
    $_SESSION['result'] = 'Login Error';
    header("Location: index.php");
    exit;
  }
}
print_r ($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
</head>
<body>

<ul>
  <li>
    <a href="secret.php">Secret page</a>
  </li>
</ul>

<h3>Страница видна всем пользователям</h3>

<form action="" method="POST">
  <p>Login: <input type="text" name="login"></p>
  <p>Password: <input type="password" name="password"></p>
  <button type="submit">Login</button>
</form>
<br>
<?php 
if (isset($_SESSION['result'])) {
echo $_SESSION['result'];
unset($_SESSION['result']);
}
?>

</body>
</html>

____________________________________________________________________________________

<!-- Второй файл -->

<?php
session_start();
print_r ($_SESSION);
if (isset($_GET['do']) && $_GET['do'] == 'logout') {
  unset($_SESSION['auth']);
  $_SESSION['result'] = 'Вы вышли';
  header("Location: index.php"); exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Secret</title>
</head>
<body>
<ul>
  <li>
    <a href="index.php">Index page</a>
  </li>
</ul>

<?php 
if (isset($_SESSION['result'])) {
echo $_SESSION['result'];
unset($_SESSION['result']);
}
?>

<?php if (!empty($_SESSION['auth'])): ?> 
  <h3>Страница видна только авторизированным пользователям</h3>
  <a href="?do=logout">Logout</a>
<?php else: ?>
  <h3>Вы не авторизованны</h3>
<?php endif; ?>

</body>
</html>