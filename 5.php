<?php
error_reporting(E_ALL);
$dir = __DIR__ . '/5';
$namf = 'txt';
function showFile($dir, $namf)
{

    if ($papka = scandir($dir)) {
        echo 'Список папки: ' . $dir . '<br/>';
        natcasesort($papka);
        foreach ($papka as $file) {
            if (preg_match("/" . $namf . "/", $file)) {
                echo $file . '<br/>';
            }
        }
    }

}

showFile($dir, $namf);