<?= snippet('head') ?>

<main>

    <div class="mx-4 pt-4 border-t border-secondary grid gap-4 grid-cols-1 md:grid-cols-2">

        <div class="col-span-1">
            <?php if ($page->header()->isNotEmpty()): ?>
                <div class="text-5xl font-semibold">
                    <h1><?= $page->header() ?></h1>
                </div>
            <?php endif ?>

            <p class="pt-4 text-lg font-medium leading-tight">
                <?= $page->about()->kti() ?> 
            </p>

            <?php if ($page->external_link()->isNotEmpty()): ?>
                <div class="mt-4 border-t border-secondary">
                    <?php $link = $page->external_link()->toStructure(); foreach ($link as $link): ?>
                        <span class="flex">
                            <a href="<?= $link->link_url() ?>" target="_blank" class="pt-2 text-lg font-medium leading-tight underline underline-offset-4"><?= $link->link_title() ?></a>
                        </span>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </div>

        <div class="col-span-1">
            <?php 
            foreach($page->about_images()->toBlocks() as $block):
                snippet('blocks/' . $block->type(), [
                    'block' => $block
                ]);
            endforeach;
            ?>
        </div>

    </div>

</main> 

<?= snippet('footer') ?>