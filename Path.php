<?php

#C:\OSPanel\domains\test\index.php
$path = __DIR__ . '/index.php';

#Аналогичный путь, но сначала поднялись на папку выше
$path = __DIR__ . '/../test/index.php';

#Аналогичный путь, но сначала поднялись на две папки выше
$path = __DIR__ . '/../../domains/test/index.php';


echo realpath($path);
