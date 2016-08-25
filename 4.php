<?php
error_reporting(E_ALL);
$dir = __DIR__ . '/4';
function showFile($dir)
{

    if ($papka = scandir($dir)) {
        echo 'Список папки: ' . $dir . '<br/>';
        natcasesort($papka);
        foreach ($papka as $file) {
            echo $file . '<br/>';
        }
    }

}

showFile($dir);