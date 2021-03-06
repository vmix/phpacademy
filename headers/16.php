<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 5/17/17
 * Time: 12:34 PM
 * Чтение переменных окружения
 */
//Переменные окружения (environment variables) представляют собой набор име-
//
//нованных значений, связанных с процессом. Например, в Unix вызов
//
//getenv('HOME') возвращает домашний каталог пользователя:
//
//print getenv('HOME'); // Домашний каталог пользователя

//По умолчанию PHP автоматически загружает переменные окружения в $_ENV.
//
//Тем не менее директивы php.ini-development и php.ini-production отключают
//
//загрузку окружения по соображениям быстродействия.
//
//Если вы часто обращаетесь к переменным окружения, включите загрузку масси-
//
//ва $_ENV, добавив символ E в конфигурационную директиву variables_order.
//
//После этого вы сможете читать значения из суперглобального массива $_ENV.
#Пример:

$name = $_ENV['USER'];

#Функция getenv() недоступна при выполнении PHP в виде модуля ISAPI.