
Способы отправки данных:
1. Форма с методом POST (данные попадают в массив $_POST)
2. Форма с методом GET (данные попадают в массив $_GET)
3. Ссылка с методом GET (данные попадают в массив $_GET)

<!-- ПАРАМЕТРЫ ФОРМЫ -->
<input method="">   Метод отправки GET или POST, по умолчанию будет GET
<input action="">   Путь к файлу, где обрабатываются данные формы
<input name="">     Ключ эллемента отправленного формой или ссылкой
<input value="">    Значение эллемента отправленного формой ссылкой
<input type="">     Указывает на тип эллемента формы

<!-- ТИПЫ ФОРМЫ -->
<input type="text">      Поле ввода текста. Пользователь вводит текст в одной строке.
<input type="password">  Поле ввода пароля. Введенные данные отображаются  ******
<input type="email">:    Поле ввода email-адреса. Идет проверка соответствия имейлу
<input type="checkbox">  Флажок, позволяющий выбрать одну или несколько опций.
<input type="radio">     Переключатель, выбирающий один из нескольких вариантов
<input type="submit">    Кнопка отправки формы. Нажатие отправляет данные на сервер
<input type="reset">     Кнопка сброса формы. Нажатие сбрасывает введеные поля
<input type="file">      Поле ввода файла, выбирается файл для отправки на сервер
<input type="hidden">    Скрытое поле, данные не видны, но они отправятся на сервер
<textarea></textarea>    Поле для ввода нескольких строк текста
<select></select>        Выпадающий список, пользователь выбирает элементы списка
<option></option>        Эллемент использующийся внутри выпадающего списка
<button></button>        Кнопка, пользователь нажимает её для определенных действий
<button name="">         С помощью этого ключа мы различаем формы на одной странице
<button value="">        Значение ключа кнопки, мы задаем его сами

<!-- Отправка данных с помощью формы методом POST -->
<form action="action.php" method="POST">
  <!-- Строки ввода данных -->
  Username: <input type="text" name="username">
  Email: <input type="text" name="email">
  <!-- Поле ввода данных -->
  Text: <textarea name="message"></textarea>
  <!-- Чекбокс вкл/выкл -->
  Agree: <input type="checkbox" name="agree">
  <!-- Выпадающий список -->
  <select name="lang">
    <!-- Элементы выпадающего списка -->
    <option value="ru">Russian</option>
    <option value="eng">English</option>
    <option value="fr">France</option>
  </select>
  <!-- Кнопка отправки данных -->
  <button type="submit" name="send_form" value="send">
</form>


<!-- Отправка данных с помощью ссылки методом GET -->

<a href="?name=Alex&age=35">Ссылка</a>

После нажатия на ссылку данные отправляются и попадают в массив $_GET
Знак  ?  объявляет начало GET запроса
Знак  &  разделяет элементы 
Знак  =  разделяет ключ и значение


<!-- Хитрость с выбором нескольких чекбоксов -->

<form action="" method="POST">
  <input type="checkbox" name="fruits[]" value="apple"> Apple<br>
  <input type="checkbox" name="fruits[]" value="banana"> Banana<br>
  <input type="checkbox" name="fruits[]" value="orange"> Orange<br>
  <button type="submit">Submit</button>
</form>

$_POST => Array (
    [fruits] => Array (
        [0] => apple
        [1] => banana
        [2] => orange
    )
)
