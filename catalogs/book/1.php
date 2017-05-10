<?php
/**
 * Created by PhpStorm.
 * User: 0311
 * Date: 10.05.2017
 * Time: 11:00 AM
 * Кроме непосредственного содержимого файлов, файловая система хранит много
дополнительной информации о файлах. В эту информацию включается размер
файла, каталог и разрешения доступа. Если вы работаете с файлами, скорее все-
го, вам также потребуется работать с этими метаданными. PHP предоставляет
разнообразные функции для чтения и выполнения операций с каталогами, эле-
ментами каталогов и атрибутами файлов. Как и другие части PHP, относящиеся
к файлам, эти функции напоминают функции C, которые решают те же задачи
(с некоторыми упрощениями).
Для создания файловой структуры используются так называемые индексные узлы.
Каждый файл (как и любая другая часть файловой системы — каталог, устройство
и ссылка) имеет собственный индексный узел, в котором хранится указатель на
блоки данных файла, а также все метаданные этого файла. Блоки данных ката-
логов содержат имена файлов, находящихся в этом каталоге, и индексные узлы
всех файлов.
В PHP предусмотрено несколько способов просмотра содержимого каталогов
и получения списка находящихся в нем файлов. Класс DirectoryIterator предо-
ставляет полноценный объектно-ориентированный интерфейс для перебора
содержимого каталогов. В следующем примере DirectoryIterator используется
для вывода имени каждого файла в каталоге:
 */
foreach (new DirectoryIterator('/usr/local/images') as $file) {
    print $file->getPathname() . "\n";
}
/**
 * Функции opendir(), readdir() и closedir() представляют процедурный подход
к решению той же задачи. Функция opendir() возвращает дескриптор каталога,
функция readdir() перебирает файлы, а функция closedir() закрывает дескрип-
тор каталога.
 */
$d = opendir('/usr/local/images') or die($php_errormsg);
while (false !== ($f = readdir($d))) {
    print $f . "\n";
}
closedir($d);