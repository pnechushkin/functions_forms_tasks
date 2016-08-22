<?php
$string = 'яблоко черешня вишня вишня черешня груша яблоко черешня вишня яблоко вишня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня черешня груша яблоко черешня вишня';
$arr = explode(" ", $string);
$unique_val = array_unique($arr );
foreach ($unique_val as $val)
{
    foreach ($unique_val as $val)
    {$c=count($arr);
      $nam=0;
        for ($i=0; $i<$c; $i++)
        {
            if ($val==$arr[$i]) {$nam++; $rez[$val]=$nam;  }
        }
    }
}
arsort($rez);
echo '<pre>';
print_r($rez);
echo '</pre>';