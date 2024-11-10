<?php
//Пользователь ввел адрес в адресную строку
//Данные передаются в json формате, он похож на а-массив, в нем есть ключ-значение

// Отправка методом POST
POST /api/products HTTP/1.1
Host: example.com
Content-Type: application/json
Content-Length: 74

{
    "name": "Example Product",
    "price": 99.99,
    "description": "This is an example product"
}

// Отправка методом GET
GET /api/products?id=1&name=example HTTP/1.1
Host: example.com

// Сервер принял данные, роут вызывает метод контроллера
Route::get('/api/products/{id}', 'ProductController@show');

// Метод контроллера отрабатывает логику
public function show($id)
{
    $product = Product::find($id);
    // Формирование JSON-ответа
    return response()->json($product);
}

// Сервер отправляет ответ - файл JSON
HTTP/1.1 200 OK
Content-Type: application/json

{
    "id": 123,
    "name": "Example Product",
    "price": 99.99,
    "description": "This is an example product"
}

// Клиент полуает файл JSON ответа от сервера, и его обрабатывает браузер
var product = JSON.parse(response); // Парсинг JSON-ответа
console.log(product.id); // Вывод информации о продукте на консоль
console.log(product.name);
console.log(product.price);
console.log(product.description);