<?php
require '../include/init.php';

Auth::requireLogin();

$conn = require '../include/db.php';

// $paginator = new Paginator(isset($_GET['page']) ? $_GET['page'] : 1, 5); // by using ternary operator
$paginator = new Paginator($_GET['page'] ?? 1, 7, Article::getTotal($conn));	 // php Null coalescing operator [if $_GET['page'] exist then it will show else other] + Total number of content

$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);		// Show articles with page containing 5 article limit and 0 offset value

?>


<?php require '../include/header.php'; ?>
<h2 class="fw-bold mb-4">Administrator Dashboard</h2>
<p><a href="new-article.php" class="btn btn-success mb-3">+ Add New Article</a></p>
<?php if (empty($articles)): ?>
    <div class="alert alert-warning">Oops! No articles are there.</div>
<?php else: ?>
    <div class="table-responsive mb-4">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Published at</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article): ?>
                    <tr>
                        <td>
                            <a href="article.php?id=<?= $article['id']; ?>" class="fw-semibold link-primary text-decoration-none"><?= htmlspecialchars($article['title']); ?></a>
                        </td>
                        <td>
                            <?php if ($article['published_at']): ?>
                                <time><?= $article['published_at'] ?></time>
                            <?php else: ?>
                                <span class="text-muted">Unpublished</span>
                                <button class="btn btn-sm btn-outline-primary ms-2 publish" data-id="<?= $article['id'] ?>">Publish</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php require '../include/pagination.php'; ?>
<?php endif; ?>
<?php require '../include/footer.php' ?>
