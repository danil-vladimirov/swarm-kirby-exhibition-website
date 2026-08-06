<?php

require __DIR__ . '/vendor/autoload.php';

echo (new Kirby\Cms\App([
    'roots' => [
        'index' => __DIR__,
    ],
]))->render();
