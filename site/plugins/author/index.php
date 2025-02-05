<?php
Kirby::plugin('custom/author', [
    'sections' => [
        'author' => [
            'props' => [
                'author' => function ($author) {
                    return $author;
                }
            ]
        ]
    ]
]);