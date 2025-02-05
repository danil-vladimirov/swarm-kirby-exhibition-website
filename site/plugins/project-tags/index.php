<?php

Kirby::plugin('danilvladimirov/project-tags', [
    'fields' => [
        'project-category' => [
            'extends' => 'radio',
            'computed' => [
                'type' => function() {
                    $home = site()->find('home');
                    return ($home && $home->categories_toggle()->isTrue()) ? 'radio' : 'hidden';
                },
                'options' => function () {
                    $home = site()->find('home');
                    if ($home && $home->categories_toggle()->isTrue()) {
                        return $home->categories()->toStructure()->map(function($item) {
                            return [
                                'text' => $item->category_title()->value(),
                                'value' => $item->category_title()->value()
                            ];
                        })->data();
                    }
                    return [];
                },
                'required' => function() {
                    $home = site()->find('home');
                    return ($home && $home->categories_toggle()->isTrue());
                },
                'disabled' => function() {
                    $home = site()->find('home');
                    return !($home && $home->categories_toggle()->isTrue());
                }
            ],
            'props' => [
                'label' => 'Project category'
            ]
        ]
    ]
]);