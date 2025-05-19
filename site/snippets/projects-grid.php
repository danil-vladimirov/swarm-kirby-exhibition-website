<?php if (page('works')->hasChildren()): ?>

    <div class="relative px-4 pb-4 grid grid-cols-2 gap-y-4 gap-x-4 md:grid-cols-3 xl:grid-cols-4">

    <?php $works = page('works')->children()->published()->sortBy('surname', 'asc');
    foreach ($works as $work): ?>

        <a href="<?= $work->url() ?>" class="relative">
            <div class="flex flex-col gap-x-5">
                <div class="w-full">
                    <div class="w-full overflow-hidden">
                        <?php if ($img = $work->cover()->toFile()): ?>
                            <?= $img->tag() ?>
                        <?php endif ?>
                    </div>
                    <div class="flex flex-col mt-2">
                        <div class="flex font-medium text-lg md:text-2xl"><?= $work->name() ?> <?= $work->surname() ?></div>
                        <div class="flex"><?= $work->project_title() ?></div>
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

<?php else : ?>

    <div class="mx-4 mb-4 relative flex flex-col h-[50vh] md:h-[70vh] items-center text-center justify-center">
        <div class="px-4 mt-4 max-w-4xl mx-auto text-4xl">
            Congrats! You created your website
        </div>
        <div class="px-4 pt-8 md:pt-16 max-w-5xl mx-auto text-2xl md:text-3xl">
            Now you can go to the <a href="/panel" class="underline">Kirby panel</a> and follow the installation instructions.
            Add your first project to remove this text.
        </div>
    </div>

<?php endif ?>