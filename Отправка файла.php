<h1>Форма отправки файлов, не забудь атребут enctype="multipart/form-data"</h1>
<h2>Он дает указание отправлять файл небольшими частами, а не целиком</h2>

<form action="data.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="picture">
  <button type="submit">Отправить картинку</button>

<?php

/*
var_dump($_FILES);

array (size=1)
  'picture' => 
    array (size=5)
      'name' => string 'man-2.png' (length=9)
      'type' => string 'image/png' (length=9)
      'tmp_name' => string 'C:\OSPanel\userdata\temp\upload\phpBFF8.tmp' (
      length=43)
      'error' => int 0
      'size' => int 38820

*/

#Если картинка существует и нет ошибок => перемещаем её из временного хранилища
#В текущую папку под названием 'test.png'
if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
  move_uploaded_file($_FILES['picture']['tmp_name'], __DIR__ . '/test.png');
}
