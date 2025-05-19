<?php

use Kirby\Cms\App as Kirby;
use Kirby\Cms\Html;
use Kirby\Cms\Field;
use Kirby\Toolkit\Str;

Kirby::plugin('danilvladimirov/project-fields', [
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
                }
            ],
            'props' => [
                'label' => 'Project category',
                'required' => true,
            ]
        ]
    ],
    'fileMethods' => [
        'tag' => function (string $size = 'large') {

            return Html::tag('img', null, [
                'alt' => $this->alt(),
                'width' => $this->width(),
                'height' => $this->height(),
                'class' => 'lazyload',
                'data-sizes' => 'auto',
                'src' => $this->resize(2000)->url(),
                'data-src' => $this->resize(2000)->url(),
                'data-srcset' => $this->srcset($size),
            ]);
        },
        'alt' => function (): string {

            $alt = '';

            if ($this->description()->isNotEmpty()) {
                $alt = $this->description()->html();
            } else {
                $alt = $this->parent()->title()->html();
            }

            if ($this->credits()->isNotEmpty()) {
                $alt .= ' (©' . $this->description()->html() . ')';
                $alt = trim($alt);
            }

            return $alt;
        }
    ]
]);