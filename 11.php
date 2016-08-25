<?php
$string = 'а Васька слушает да ест. а воз и ныне там. а вы друзья как ни садитесь, все в музыканты не годитесь. а король-то — голый. а ларчик просто открывался.а там хоть трава не расти.';
echo $string . '<br/>';

if (!function_exists('mb_ucfirst') && extension_loaded('mbstring')) {
    /**
     * mb_ucfirst - преобразует первый символ в верхний регистр
     * @param string $str - строка
     * @param string $encoding - кодировка, по-умолчанию UTF-8
     * @return string
     */
    function mb_ucfirst($str, $encoding = 'UTF-8')
    {
        $str = trim($str);
        $str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding) .
            mb_substr($str, 1, mb_strlen($str), $encoding);
        return $str;
    }
}


function relsrt($string)
{
    $arr = preg_split("/[\.]+/", $string);

    $stroka = null;
    foreach ($arr as $value) {
        if (!empty($value)) {
            $stroka .= mb_ucfirst($value) . '. ';
        }
    }
    return $stroka;
}

echo relsrt($string);