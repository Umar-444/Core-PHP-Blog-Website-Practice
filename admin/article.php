<?php
require '../include/init.php';

Auth::requireLogin();
// PDO check PDO comments and look back earlier codes in project
$conn = require '../include/db.php';

if (isset($_GET['id']))
{
	$article = Article::getWithCategories($conn, $_GET['id']);	// PDO (function calling from Article class)
} else {
	$article = null;
}
?>


<?php require '../include/header.php'; ?>
<?php if ($article): ?>
    <article class="card shadow-sm border-0 p-4 my-4 mx-auto" style="max-width: 750px;">
        <h2 class="fw-bold mb-2"><?= htmlspecialchars($article[0]['title']); ?></h2>
        <?php if ($article[0]['published_at']): ?>
            <time class="small text-muted mb-3 d-block"><?= $article[0]['published_at'] ?></time>
        <?php else: ?>
            <span class="badge bg-warning text-dark mb-3">Unpublished</span>
        <?php endif; ?>
        <?php if ($article[0]['category_name']): ?>
            <div class="mb-2">
                <span class="me-2 fw-semibold text-secondary">Categories:</span>
                <?php foreach ($article as $a): ?>
                    <span class="badge category-badge"><?= htmlspecialchars($a['category_name']); ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if ($article[0]['image_file']): ?>
            <img src="/uploads/<?= $article[0]['image_file']; ?>" alt="Content Image" class="img-fluid rounded mb-3" style="max-height: 270px; object-fit:cover; width:100%;">
        <?php endif; ?>
        <div class="mb-3" style="white-space:pre-line;"> <?= htmlspecialchars($article[0]['content']); ?></div>
        <div class="d-flex gap-2">
            <a href="edit-article.php?id=<?= $article[0]['id']; ?>" class="btn btn-outline-info">Edit</a>
            <a class="btn btn-outline-danger delete" href="delete-article.php?id=<?= $article[0]['id']; ?>">Delete</a>
            <a href="edit-article-image.php?id=<?= $article[0]['id']; ?>" class="btn btn-outline-secondary">Edit image</a>
        </div>
    </article>
<?php else: ?>
    <div class="alert alert-danger">No Article found.</div>
<?php endif; ?>
<?php require '../include/footer.php'; ?>
