<!DOCTYPE html>

<?php 
// fallback to white and black colors if not set

if (page('home')->bg_color()->isNotEmpty()):
$bgcolor = page('home')->bg_color();
else:
$bgcolor = 'rgb(255, 255, 255)';
endif;

if (page('home')->text_color()->isNotEmpty()):
$textcolor = page('home')->text_color();
else:
$textcolor = 'rgb(0, 0, 0)';
endif;
?>

<html 
    lang="<?= $site->lang() ?>" 
    style="--color-primary: <?= str_replace(["rgb(", ")"], "", $bgcolor) ?>;--color-secondary: <?= str_replace(["rgb(", ")"], "", $textcolor) ?>"
    class="bg-primary text-secondary"
>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php snippet('seo/head'); ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&display=swap&text=↑→↓←↗" rel="stylesheet">

    <?= css('assets/css/styles.css') ?>

    <?php if($image = page('home')->favicon()->toFile()): ?>
        <link rel="icon" type="image/png" sizes="32x32" href="<?= $image->resize(32)->url() ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?= $image->resize(96)->url() ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= $image->resize(16)->url() ?>">
        <link rel="alternate icon" type="image/png" href="<?= $image->resize(180)->url() ?>">
        <link rel="apple-touch-icon" type="image/png" href="<?= $image->resize(180)->url() ?>">
        <link rel="apple-touch-icon" type="image/png" sizes="167x167" href="<?= $image->resize(167)->url() ?>">
        <link rel="apple-touch-icon" type="image/png" sizes="152x152" href="<?= $image->resize(152)->url() ?>">
    <?php endif ?>

</head>

<body>
    <div class="flex min-h-screen flex-col">

        <nav class="flex flex-wrap justify-between items-center gap-x-5 gap-y-3 px-4 py-4 md:px-4 md:py-4 lg:px-4">
            <a href="/" class="h-full text-2xl hover:text-secondary md:text-3xl">
                <?= $site->title() ?>
            </a>

            <div class="flex flex-wrap items-center gap-6 mt-0 md:mt-0 text-sm md:text-lg uppercase">
                <a <?php e(page('about')->isActive(), ' class="inline bg-secondary text-primary py-1 px-2"') ?> href="/about" class="">ABOUT</a>

                <?php $links = page('home')->header_links()->toStructure(); foreach ($links as $link): ?>
                    <a href="<?= $link->link_url() ?>" class="flex flex-wrap gap-3 mt-0 md:mt-0" target="_blank"><?= $link->link_title() ?> ↗</a>
                <?php endforeach ?>
            </div>
        </nav>