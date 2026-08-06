<?= snippet('head') ?>

<main class="flex-grow">

    <?php if ($page->intro_title()->isNotEmpty()): ?>
        <?php $image = $page->intro_bg_image()->toFile() ?>

        <div
            class="mx-4 mb-4 relative flex flex-col h-[50vh] md:h-[70vh] items-center text-center justify-center"
            style="<?php if ($page->intro_text_color()->isNotEmpty()): ?>color: <?= $page->intro_text_color()->escape('html') ?>;<?php endif ?>
                <?php if ($page->intro_bg_color()->isNotEmpty()): ?>background-color: <?= $page->intro_bg_color()->escape('html') ?>;<?php endif ?>"
        >
            <?php if ($image): ?>
                <img
                    alt="<?= $image->alt() ?>"
                    class="lazyload absolute top-0 left-0 w-full h-full"
                    data-sizes="auto"
                    src="<?= $image->resize(64)->url() ?>"
                    data-src="<?= $image->resize(2400)->url() ?>"
                    data-srcset="<?= $image->srcset('large') ?>"
                    width="<?= $image->width() ?>"
                    height="<?= $image->height() ?>"
                    style="object-fit: cover; object-position: center;"
                >
            <?php endif ?>

            <div class="relative z-10 px-4 mt-4 max-w-4xl mx-auto text-4xl md:text-7xl">
                <?= $page->intro_title()->kti() ?>
            </div>
            <?php if ($page->intro_subtitle()->isNotEmpty()): ?>
                <div class="relative z-10 px-4 pt-8 md:pt-16 max-w-5xl mx-auto text-2xl md:text-3xl">
                    <?= $page->intro_subtitle()->kti() ?>
                </div>
            <?php endif ?>
        </div>
    <?php endif ?>

    <?= snippet('categories') ?>

    <?= snippet('projects-grid') ?>

</main>

<?= snippet('footer') ?>
