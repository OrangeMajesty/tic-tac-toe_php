<?php

global $ROOT_PATH;
$ROOT_PATH = __DIR__;

requireFromDir('controllers');

include __DIR__ . '/model.php';
include __DIR__ . '/router.php';

function requireFromDir($dir)
{
    global $ROOT_PATH;
    $files = scandir($ROOT_PATH . '/' . $dir);
    foreach ($files as $file) {
        $filePath = __DIR__ . '/' . $dir . '/' . $file;
        if (is_file($filePath))
            require $filePath;
    }
}
