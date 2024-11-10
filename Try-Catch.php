<?php
// создаем класс исключения ошибки и наследуемся (недостаточно средств на счете)
class notEnoughMoneyException extends Exception {
    // При создании экземпляра класса будет вызываться конструктор
    // для переопределения свойств, но они указаны здесь по умолчанию.
    public function __construct($message = "Недостаточно средств на счете", $code = 1, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
// создаем класс исключения ошибки и наследуемся (некорректная сумма для снятия)
class IncorrectWithdrawException extends Exception {
    public function __construct($message = "Некорректная сумма для снятия", $code = 2, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}

// создаем класс (счет)
class Account {
    // параметр балланса по умолчанию равен 0
    private $balance = 0;

    // создаем метод снятия суммы со счета
    public function withdraw($amount) {
        // если сумма снятия меньше или равна 0, то выполняем блок кода if
        if ($amount <= 0) {
            // Оператор throw создаем экземпляр класса IncorrectWithdrawException
            // без присвоения переменной сразу бросает его в нужный блок кода catch
            // в () можно переопределить свойства данные по умолчанию
            throw new IncorrectWithdrawException();
        }
        // если сумма снятия меньше балланса, то выполняем блок кода if
        if ($this->balance < $amount) {
            // Оператор throw создаем экземпляр класса notEnoughMoneyException
            // без присвоения переменной сразу бросает его в нужный блок кода catch
            // в () можно переопределить свойства данные по умолчанию
            throw new notEnoughMoneyException();
        }
        // Выполняем снятие денег со счета, если блоки if вернули false
        $this->balance -= $amount;
    }
}

// Создаем экземпляр класса Account
$account = new Account();

try {
    // Пытаемся снять 100 руб. со счета
    $account->withdraw(100);
// Если какой-либо из блоков catch принял в (аргументы) экземпляр класса Исключения Ошибок, то он отрабатывает свой блок кода в {...}
// $e - это переменная, которая содержит экземпляр класса notEnoughMoneyException, который был передан в блок catch в качестве аргумента.
// $e->getMessage() метод выводит сообщение об ошибке.
} catch (notEnoughMoneyException $e) {
    echo 'Ошибка недостатка средств на счете: ' . $e->getMessage();
} catch (IncorrectWithdrawException $e) {
    echo 'Ошибка некорректной суммы для снятия: ' . $e->getMessage();
} catch (Exception $e) {
    echo 'Общая ошибка: ' . $e->getMessage();
}

22 минуты 