<?php
/**
 * Created by PhpStorm.
 * User: 0311
 * Date: 03.05.2017
 * Time: 3:17 PM
 */
/**
 * 13. Есть строка $string = 'яблоко черешня вишня вишня черешня груша яблоко черешня вишня яблоко вишня
 * вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня вишня черешня груша яблоко
 * черешня черешня вишня яблоко вишня вишня черешня черешня груша яблоко черешня вишня';<br>
<br>
Подсчитайте, сколько раз каждый фрукт встречается в этой строке. Выведите  в виде списка в порядке уменьшения количества:<br><br>
Пример вывода:<br>
яблоко – 12<br>
черешня – 8<br>
груша – 5<br>
слива - 3<br>
</p>
 */
$string = 'банан яблоко черешня вишня вишня черешня груша яблоко черешня вишня яблоко вишня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня черешня груша яблоко черешня вишня';
$arr = explode(' ',$string);
var_dump($arr);
$rez_array = array();
foreach ($arr as $key1 => $value1) {
    foreach ($arr as $key2 => $value2) {
        if ($value1 == $value2){
            if (!isset($rez_array[$value1]))
                $rez_array[$value1]=0;
            $rez_array[$value1]++;
            unset($arr[$key2]);
        }
    }
}
echo "<br>";
print_r($rez_array);