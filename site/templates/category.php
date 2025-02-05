<?= snippet('head') ?>

<main>

    <div class="mx-4 mb-12 py-2 md:py-1 border-y border-secondary text-sm md:text-lg uppercase">
        <ul class="flex flex-wrap gap-x-5 gap-y-1 items-center">
            <a href="/works">
                <li class="inline">ALL WORK</li>
            </a>

            <!-- fetch all tags -->
            <?php $alltags = page('works')->children()->listed()->pluck('tags', ',', true);?>

            <?php foreach ($alltags as $alltag) : ?>
                <a href="<?= page('works')->url() . '/' . urlencode($alltag) ?>" class="inline-flex">
                    <li 
                        <?php if ($alltag == $tag) : ?> 
                            class="inline bg-secondary text-primary text-sm py-1 px-2">
                        <?php else : ?>
                            class="inline">
                        <?php endif ?>
                            <?= $alltag ?>
                    </li>
                </a>

                <!-- <a href="<?= url('works', ['params' => ['tag' => $alltag]]) ?>">
                    <?= html($alltag) ?>
                </a> -->
            <?php endforeach ?>

        </ul>
    </div>

    <div class="relative px-4 pb-4 grid grid-cols-2 gap-y-4 gap-x-4 md:grid-cols-3 xl:grid-cols-4">

        <?php $sortedworks = $articles->sortBy('surname', 'asc');
        foreach ($sortedworks as $article) : ?>

            <a href="<?= $article->url() ?>" class="relative">
                <div class="flex flex-col gap-x-5">
                    <div class="w-full">
                        <div class="w-full overflow-hidden">
                            <?php foreach ($article->cover()->toFiles() as $img): ?>
                                <img src="<?= $img->resize(400)->url() ?>" class="relative w-full" alt="">
                            <?php endforeach ?>
                        </div>
                        <div class="flex flex-col mt-2">
                            <div class="flex font-medium text-lg md:text-2xl"><?= $article->name() ?> <?= $article->surname() ?></div>
                            <div class="flex"><?= $article->project_title() ?></div>
                        </div>
                    </div>
                </div>

                <!-- Grid border row/column dividers -->
                <span class="absolute top-auto right-0 border-b border-secondary bottom-[calc(-.5*1rem)] left-[calc(-1*1rem)]" aria-hidden="true"></span>
                <span class="absolute top-0 left-[calc(-.5*1rem)] right-auto bottom-0 border-l border-secondary" aria-hidden="true"></span>
            </a>

        <?php endforeach ?>
                            
        <!-- Hide excess from dividers -->
        <span class="absolute col-auto row-auto top-0 bottom-0 left-0 w-4 bg-primary z-10" aria-hidden="true"></span>
        <span class="absolute col-auto row-auto bottom-0 left-0 right-0 h-4 bg-primary z-10" aria-hidden="true"></span>
    </div>

</main>

<?= snippet('footer') ?>