<?php
/**
 * Created by PhpStorm.
 * User: 0311
 * Date: 10.05.2017
 * Time: 10:34 AM
 * Чтение файла в строку
 * Требуется загрузить все содержимое файла в переменную. Например, вы хотите
определить, существует ли в тексте совпадение для регулярного выражения.
 */
$people = file_get_contents('people.txt');

if (preg_match('/Names:.*(David|Susannah)/i',$people)) {
    print "people.txt matches.";
}
/**
 * Если содержимое файла требуется сохранить в строке для обработки, то функция
file_get_contents() прекрасно подойдет. Но если все содержимое файла нужно
вывести, существуют и более простые (и более эффективные) способы, чем чте-
ние его в строку с последующим выводом строки. PHP предоставляет две функ-
ции для решения этой задачи. Первая функция, fpassthru($fh), выводит все
оставшееся содержимое файлового дескриптора $fh, а затем закрывает его. Вто-
рая функция, readfile($filename), выводит все содержимое $filename.
 * Функция readfile() реализует обертку для изображений, которые должны ото-
бражаться только при выполнении некоторого условия. Следующая программа
убеждается в том, что запрашиваемое изображение появилось менее недели назад:
 */
$image_directory = '/usr/local/images';

if (preg_match('/^[a-zA-Z0-9]+\.(gif|jpe?g)$/',$image,$matches) &&
    is_readable($image_directory."/$image") &&
    (filemtime($image_directory."/$image") >= (time() - 86400 * 7))) {
    header('Content-Type: image/'.$matches[1]);
    header('Content-Length: '.filesize($image_directory."/$image"));
    readfile($image_directory."/$image");
} else {
    error_log("Can't serve image: $image");
}
/**
Чтобы обертка работала эффективно, каталог, в котором хранятся изображения
($image_directory), должен находиться за пределами корневого каталога доку-
ментов веб-сервера. В противном случае пользователь может просто обратиться
к файлам изображений напрямую. Код проверяет файл изображения по трем
условиям. Сначала он убеждается в том, что имя файла, переданное в $image,
состоит из алфавитно-цифровых символов и завершается суффиксом .gif, .jpg или
.jpeg. Также нужно проследить за тем, чтобы в имени файла не было таких сим-
волов, как .. или /; это позволило бы злоумышленникам загружать файлы за
пределами заданного каталога. Кроме того, функция is_readable() проверяет,
что программа может прочитать файл. Наконец, функция filemtime() проверяет
время изменения файла и убеждается в том, что оно не больше 86 400 × 7 секунд
(в сутках 86 400, поэтому 86 400 × 7 — неделя1).
Если все условия выполнены, изображение можно отправлять. Сначала отправ-
ляются два заголовка, которые сообщают браузеру тип MIME и размер файла
изображения. Затем функция readfile() передает все содержимое файла поль-
зователю.
 */