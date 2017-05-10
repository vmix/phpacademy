<?php
/**
 * Created by PhpStorm.
 * User: 0311
 * Date: 10.05.2017
 * Time: 8:19 AM
 */
/**
 * 9.9. Проверка ввода на форме:кредитные карты
Задача: Требуется убедиться в том, что пользователь не ввел вымышленный номер кре
дитной карты.
 * Для защиты от случайных ошибок при вводе номера кредитной карты использу-
ется алгоритм Луна. Этот алгоритм, реализованный функцией is_valid_credit_
card() выполняет вычисления с отдельными цифрами номера
для проверки правильности числа.
Процесс проверки кредитной карты отчасти напоминает проверку адреса электрон-
ной почты. Синтаксическая проверка (то есть проверка того, что переданная по-
следовательность символов соответствует стандарту) реализуется относительно
легко. С семантической проверкой дело обстоит сложнее. Номер кредитной карты
4111 1111 1111 1111 проходит проверку функции из листинга , но действитель-
ным он не является. Это хорошо известное тестовое число, сходное с номером
карты Visa (поэтому оно часто используется в книгах в качестве примера).
Как говорилось ранее, проверка адреса электронной почты требует внешней про-
верки — обычно посредством отправки на адрес сообщения, содержащего ссылку
для подтверждения. Внешняя проверка номера кредитной карты основана на
обращении к платежной системе с информацией о владельце (имя, адрес) и полу-
чении подтверждения.
Синтаксическая проверка хорошо защищает от случайных опечаток при вводе,
но разумеется, для проверки номеров кредитных карт ее недостаточно.
 */
function is_valid_credit_card($s){
    //Удаление нецифровых символов и перестановка в обратном порядке
    $s = strrev(preg_replace('/[^\d]/','',$s));
    $sum = 0;
    for ($i=0,$j = strlen($s);$i<$j;$i++){
        //Четные цифры используются без изменений
        if (($i %2) ==0){
            $val = $s[$i];
        }else{
            //Нечетные цифры удваиваются с вычитанием 9, если результат больше 9
            $val = $s[$i] * 2;
            if ($val>9){$val -=9;}
        }
        $sum +=$val;
    }
    // Число действительно, если сумма кратна 10
    return (($sum % 10) == 0);
}
if (! is_valid_credit_card($_POST['credit_card'])){
    echo "Sorry, that card number is invalid.";
}