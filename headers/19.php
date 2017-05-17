<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 5/17/17
 * Time: 12:42 PM
 * Взаимодействие с Apache
 * Требуется организовать передачу данных от PHP другим частям процесса об-
работки запросов Apache (в частности, записывать данные в access_log).
 */
// Прочитать значение
$session = apache_note('session');
// Записать значение
apache_note('session', $session);

/**
 * В процессе обработки запроса от клиента Apache выполняет определенную по-
следовательность действий; PHP является лишь одним из звеньев этой цепочки.
Apache также осуществляет перераспределение URL, аутентификацию пользо-
вателей, регистрацию запросов в журнале и т. д. Во время обработки запроса
каждый обработчик имеет доступ к набору пар «ключ/значение» — так называ-
емой таблице уведомлений (notes table). Функция apache_note() предоставляет
доступ к таблице уведомлений для получения информации, записанной обработ-
чиками на более ранних стадиях процесса, и записи информации для обработчи-
ков более поздних стадий.
Например, если вы используете сеансовый модуль для отслеживания пользова-
телей и сохранения переменных между запросами, его можно интегрировать
с анализом журналов для определения среднего количества просмотров страниц
на одного пользователя. Используйте apache_note() в сочетании с журнальным
модулем для записи идентификатора сеанса прямо в access_log для каждого
запроса. Сначала добавьте идентификатор сеанса в таблицу уведомлений при
помощи кода из листинга 8.16.
 */
// Получение идентификатора сеанса
// и включение его в таблицу уведомлений Apache
apache_note('session_id', session_id());