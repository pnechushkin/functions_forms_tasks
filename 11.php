<?php
$string = 'а Васька слушает да ест. а воз и ныне там. а вы друзья как ни садитесь, все в музыканты не годитесь. а король-то — голый. а ларчик просто открывался.а там хоть трава не расти.';
echo $string.'<br/>';
function relsrt ($string){
$arr=preg_split("/[\.]+$/", $string);
print_r($string);
$stroka=null;
foreach ($arr as $value)
{echo $value.'<br/>';
    if (!empty($value)) {$stroka.= $value.'. ';}
}
return $stroka;
}
echo relsrt ($string);