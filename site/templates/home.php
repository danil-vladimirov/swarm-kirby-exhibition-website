<?= snippet('head') ?>

<main>

    <?php if ($page->intro_title()->isNotEmpty()): ?>
        <div 
            class="mx-4 mb-4 relative flex flex-col h-[50vh] md:h-[70vh] items-center text-center justify-center"
            style="<?php if ($page->intro_text_color()->isNotEmpty()): ?>color: <?= $page->intro_text_color()->escape('html') ?>;<?php endif ?>
                <?php if ($page->intro_bg_color()->isNotEmpty()): ?>background-color: <?= $page->intro_bg_color()->escape('html') ?>;<?php endif ?>
                <?php if($image = $page->intro_bg_image()->toFile()): ?>background-image: url('<?= $image->resize(2400)->url() ?>'); background-size: cover; background-position: center;<?php endif ?>"
        >
            <div class="px-4 mt-4 max-w-4xl mx-auto text-4xl md:text-7xl">
                <?= $page->intro_title()->kti() ?>
            </div>
            <?php if ($page->intro_subtitle()->isNotEmpty()): ?>
                <div class="px-4 pt-8 md:pt-16 max-w-5xl mx-auto text-2xl md:text-3xl">
                    <?= $page->intro_subtitle()->kti() ?>
                </div>
            <?php endif ?>
        </div>
    <?php endif ?>

    <?= snippet('categories') ?>

    <?= snippet('projects-grid') ?>

</main>

<?= snippet('footer') ?>