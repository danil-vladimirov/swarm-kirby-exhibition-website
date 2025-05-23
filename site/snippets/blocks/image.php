<?php

/** @var \Kirby\Cms\Block $block */
$alt     = $block->alt();
$caption = $block->caption();
$crop    = $block->crop()->isTrue();
$link    = $block->link();
$ratio   = $block->ratio()->or('auto');
$src     = null;

if ($block->location() == 'web') {
    $src = $block->src()->esc();
} elseif ($image = $block->image()->toFile()) {
    $alt = $alt->or($image->alt());
    $src = $image->url();
}

?>
<?php if ($src): ?>
<figure<?= Html::attr(['data-ratio' => $ratio, 'data-crop' => $crop], null, ' ') ?>>
  <?php if ($link->isNotEmpty()): ?>
  <a href="<?= Str::esc($link->toUrl()) ?>">
    <?= $image->tag() ?>
  </a>
  <?php else: ?>
    <?= $image->tag() ?>
  <?php endif ?>

  <?php if ($caption->isNotEmpty()): ?>
  <figcaption>
    <span class="block pt-2 ">
      <?= $caption ?>
    </span>
  </figcaption>
  <?php endif ?>
</figure>
<?php endif ?>