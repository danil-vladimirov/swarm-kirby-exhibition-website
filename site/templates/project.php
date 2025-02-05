<?= snippet('head') ?>

<main class="flex-grow">

    <div class="mx-4 pt-4 border-t border-secondary grid gap-4 grid-cols-1 md:grid-cols-3">

        <div class="col-span-2 mt-4 md:mt-0 order-2 md:order-1">
            <div class="flex flex-col gap-y-4">
                <?php 
                foreach($page->blocks()->toBlocks() as $block):
                    snippet('blocks/' . $block->type(), [
                        'block' => $block
                    ]);
                endforeach;
                ?>
            </div>
        </div>

        <div class="col-span-1 order-1 md:order-2">

            <?php if (page('home')->categories_toggle()->toBool() === true): ?>
                <ul class="flex mb-4 gap-x-3 text-sm font-semibold uppercase">
                    <a href="/works">
                        <li class="inline">ALL WORK</li>
                    </a>

                    <li class="inline">→</li>

                    <a href="/works/<?= urlencode($page->tags()) ?>">
                        <li class="inline"><?= $page->tags() ?></li>
                    </a>
                </ul>
            <?php endif ?>

            <div>

                <div class="text-5xl font-semibold">
                    <h1><?= $page->project_title() ?></h1>
                </div>

                <div class="text-3xl">
                    <h2><?= $page->name() ?> <?= $page->surname() ?></h2>
                </div>

                <div class="pt-4 text-lg font-medium leading-tight">
                    <p>
                        <?= $page->about()->kti() ?>
                    </p>
                </div>

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

        </div>

    </div>

</main>

<?= snippet('footer') ?>