<?php
require 'include/init.php';

// PDO check PDO comments and look back earlier codes in project
$conn = require 'include/db.php';

if (isset($_GET['id']))
{
	$article = Article::getWithCategories($conn, $_GET['id'], true);	// PDO (function calling from Article class)
} else {
	$article = null;
}

?>


<?php require 'include/header.php'; ?>
<?php if ($article): ?>
    <article class="card shadow-sm border-0 p-4 my-4 mx-auto" style="max-width: 750px;">
        <?php if ($article[0]['image_file']): ?>
            <img src="/uploads/<?= htmlspecialchars($article[0]['image_file']); ?>" alt="Content Image" class="img-fluid rounded mb-3" style="max-height: 320px; object-fit:cover; width:100%;">
        <?php endif; ?>
        <h2 class="fw-bold mb-2"><?= htmlspecialchars($article[0]['title']); ?></h2>
        <time datetime="<?= $article[0]['published_at'] ?>" class="small text-muted mb-3 d-block">
            <?php
                $datetime = new DateTime($article[0]['published_at']);
                echo $datetime->format("j F, Y");
            ?>
        </time>
        <?php if ($article[0]['category_name']): ?>
            <div class="mb-2">
                <span class="me-2 fw-semibold text-secondary">Categories:</span>
                <?php foreach ($article as $a): ?>
                    <span class="badge category-badge"><?= htmlspecialchars($a['category_name']); ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="mb-3" style="white-space:pre-line;"> <?= htmlspecialchars($article[0]['content']); ?></div>
    </article>
<?php else: ?>
    <div class="alert alert-warning">No Article found.</div>
<?php endif; ?>
<?php require 'include/footer.php'; ?>
