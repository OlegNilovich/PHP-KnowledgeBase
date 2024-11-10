<?php

if (!empty($_POST)) {
  print_r($_POST);
}
if (!empty($_GET)) {
  print_r($_GET);
}

if (isset($_POST['send_form'])) {
  echo "Отправлена первая форма";
}
if (isset($_POST['search_form'])) {
  echo "Отправлена вторая форма";
}
if (isset($_POST['fruit_form'])) {
  echo "Отправлена третья форма";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <h3>Первая форма</h3>
  <form action="index.php" method="POST">
    <p>Username: <input type="text" name="username"></p>
    <p>Email: <input type="text" name="email"></p>
    <p>Textarea: <textarea name="message"></textarea></p>
    <p>Checkbox: <input type="checkbox" name="agree"></p>
    <p>
      <select name="lang">
        <option value="ru">Russian</option>
        <option value="eng">English</option>
        <option value="fr">France</option>
      </select>
    </p>
    <p><button type="submit" name="send_form" value="send">Send</button></p>
  </form>

  <hr>

  <h3>Вторая форма</h3>
  <form action="index.php" method="POST">
    <p>Search: <input type="text" name="search"></p>
    <p><button type="submit" name="search_form" value="search">Send</button></p>
  </form>

  <hr>

  <h3>Третья форма</h3>
  <form action="index.php" method="POST">
    <input type="checkbox" name="fruits[]" value="apple"> Apple<br>
    <input type="checkbox" name="fruits[]" value="banana"> Banana<br>
    <input type="checkbox" name="fruits[]" value="orange"> Orange<br>
    <button type="submit" name="fruit_form" value="fruits">Submit</button>
  </form>

  <hr>

  <a href="?name=Alex&age=35">Ссылка</a>

</body>
</html>


<!-- ФОРМА С ВАЛИДАЦИЕЙ -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <?php $name = $_POST['name'] ?? ''; ?>
  <?php $email = $_POST['email'] ?? ''; ?>

  <?php if (!trim($name) || !trim($email)): ?>

    <?php if (!empty($_POST)): ?>
      <p>Заполните поля</p>
    <?php endif; ?>

    <form action="index.php" method="POST">
      <p>Name: <input type="text" name="name"></p>
      <p>Email: <input type="text" name="email"></p>
      <p><button type="submit">Submit</button></p>
    </form>
    
  <?php else: ?>
    <p>Name: <?php echo $_POST['name'] ?> </p>
    <p>Email: <?php echo $_POST['email'] ?> </p>
  <?php endif; ?> 

</body>
</html>
