<?php
$string = 'А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не годитесь. А король-то — голый. А ларчик просто открывался. А там хоть трава не расти.';
echo $string.'<br/>';
function relsrt ($string){
$arr=preg_split("/[\.]+/", $string);
$reversed = array_reverse($arr);
 $stroka=null;
foreach ($reversed as $value)
{
    if (!empty($value)) {$stroka.= $value.'. ';}
}
return $stroka;
}
echo relsrt ($string);