<?php

return function ($page) {

    $tag = urldecode($page->slug());
    $articles = page('works')->children()->filterBy('tags', $tag, ',');

    return [
        'articles' => $articles,
        'tag'      => $tag
    ];

};