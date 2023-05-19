<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>

<!-- Right Alignment -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item disabled">
                <a class="page-link" href="<?= $pager->getFirst() ?>" tabindex="-1">Previous</a>
            </li>
        <?PHP endif; ?>
        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>"><a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a></li>
        <?php endforeach ?>
        <?php if ($pager->hasNext()) : ?>
        <li class="page-item">
            <a class="page-link" href="<?= $pager->getNext() ?>">Next</a>
        </li>
        <?PHP endif; ?>

    </ul>
</nav>