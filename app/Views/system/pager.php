<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>

<!-- paginator -->
<div class="col-12">
    <div class="paginator">
        <span class="paginator__pages">10 from 3 702</span>
        <ul class="paginator__paginator">
            <?php if ($pager->hasPrevious()) : ?>
                <li>
                    <a href="<?= $pager->getFirst() ?>">
                        <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.75 5.36475L13.1992 5.36475" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M5.771 10.1271L0.749878 5.36496L5.771 0.602051" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </li>
            <?PHP endif; ?>
            <?php foreach ($pager->links() as $link) : ?>
                <li <?= $link['active'] ? 'class="active"' : '' ?>>
                    <a href="<?= $link['uri'] ?>">
                        <?= $link['title'] ?>
                    </a>
                </li>
            <?php endforeach ?>
            <?php if ($pager->hasNext()) : ?>
                <li>
                    <a href="<?= $pager->getNext() ?>">
                        <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.1992 5.3645L0.75 5.3645" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M8.17822 0.602051L13.1993 5.36417L8.17822 10.1271" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </li>
            <?PHP endif; ?>
        </ul>
    </div>
</div>
<!-- end paginator -->