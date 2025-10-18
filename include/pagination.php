<?php $base = strtok($_SERVER["REQUEST_URI"], '?'); ?> <!--sets the delimiter in url with '?' so that ?page=1 not repeat-->
<nav aria-label="Page navigation" class="my-4">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <?php if ($paginator->previous): ?>
                <a class="page-link" href="<?= $base; ?>?page=<?= $paginator->previous; ?>">Previous</a>
            <?php else: ?>
                <span class="page-link disabled">Previous</span>
            <?php endif; ?>
        </li>
        <li class="page-item">
            <?php if ($paginator->next): ?>
                <a class="page-link" href="<?= $base; ?>?page=<?= $paginator->next; ?>">Next</a>
            <?php else: ?>
                <span class="page-link disabled">Next</span>
            <?php endif; ?>
        </li>
    </ul>
</nav>
