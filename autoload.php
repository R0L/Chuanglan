<?php
/**
 * 自动载入
 *
 * @author ROL
 */
spl_autoload_register(function ($classname) {
    $baseDir = __DIR__  . '/src/';

    if (strpos($classname, "ROL\\Chuanglan\\") === 0) {
        $file = $baseDir . substr($classname, strlen('ROL\\Chuanglan\\')) . '.php';

        if (is_file($file))
            require_once $file;
    }
});
