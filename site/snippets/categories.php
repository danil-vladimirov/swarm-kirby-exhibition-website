<?php if (page('home')->categories_toggle()->toBool() === true): ?>
    <div class="mx-4 mb-12 py-2 md:py-1 border-y border-secondary text-sm md:text-lg uppercase">
        <ul class="flex flex-wrap gap-x-5 gap-y-2 items-center">
            <a href="/works" <?php e(page('works')->isActive(), ' class="inline bg-secondary text-primary text-sm py-1 px-2"') ?>>
                <li class="inline">ALL WORK</li>
            </a>

            <!-- fetch all tags -->
            <?php $alltags = page('works')->children()->listed()->pluck('tags', ',', true);?>

            <?php foreach ($alltags as $alltag) : ?>
                <a href="<?= page('works')->url() . '/' . urlencode($alltag) ?>">
                    <li class="inline"><?= $alltag ?></li>
                </a>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>