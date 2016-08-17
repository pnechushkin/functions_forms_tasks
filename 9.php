<?php
$str='abcde';
echo $str.'<br/>';
function relstr ($a)
{
    $rez=strrev($a);
    return $rez;
}

function myrelstr ($a)
{$c=strlen ($a);
    $rez=null;
    for ($i=$c;$i>=0;$i--)
    {$rez.=$a[$i];}
    return $rez;
}
echo myrelstr ($str).'<br/>';
echo relstr ($str).'<br/>';
