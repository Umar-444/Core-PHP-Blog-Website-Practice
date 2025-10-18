<?php
require 'include/init.php';

$conn = require 'include/db.php';

$paginator = new Paginator($_GET['page'] ?? 1, 5, Article::getTotal($conn, true));
$articles = Article::getPage($conn, $paginator->limit, $paginator->offset, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Article Index</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f6f8fa;
        }
        .container-index {
            margin-top: 30px;
            margin-bottom: 50px;
            max-width: 900px;
        }
        .article-card {
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            border-radius: 8px;
            margin-bottom: 30px;
            background: #fff;
            transition: box-shadow 0.2s;
        }
        .article-card:hover {
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
        }
        .article-header {
            padding: 1.4rem 1.5rem 0.5rem 1.5rem;
        }
        .article-categories {
            margin-top: 8px;
            margin-bottom: 8px;
        }
        .category-badge {
            margin-right: 4px;
            margin-bottom: 2px;
            background: #edeef0;
            color: #333;
        }
        .article-content {
            padding: 0 1.5rem 1.2rem 1.5rem;
        }
        .no-articles {
            padding: 2.5rem 1rem;
            text-align: center;
            color: #566;
            background: #e9ecef;
            border-radius: 6px;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
<?php require 'include/header.php'; ?>

<div class="container container-index">
    <h1 class="mb-4 text-center fw-bold">Latest Articles</h1>
    <?php if (empty($articles)): ?>
        <div class="no-articles">
            <h3>😢 Oops! No articles are there.</h3>
            <p>Please check back soon.</p>
        </div>
    <?php else: ?>
        <div class="list-unstyled">
        <?php foreach ($articles as $article): ?>
            <div class="article-card mb-4">
                <div class="article-header">
                    <h2 class="h4 mb-1">
                        <a class="text-decoration-none link-primary" href="article.php?id=<?= $article['id']; ?>">
                            <?= htmlspecialchars($article['title']); ?>
                        </a>
                    </h2>
                    <small class="text-muted">
                        <time datetime="<?= $article['published_at'] ?>">
                            <?php
                                $datetime = new DateTime($article['published_at']);
                                echo $datetime->format("j F, Y");
                            ?>
                        </time>
                    </small>
                </div>
                <div class="article-content">
                    <?php if ($article['category_names']): ?>
                        <div class="article-categories mb-2">
                            <span class="me-2 fw-semibold text-secondary">Categories:</span>
                            <?php foreach ($article['category_names'] as $name): ?>
                                <span class="badge category-badge"><?= htmlspecialchars($name); ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <p><?= nl2br(htmlspecialchars($article['content'])); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
        <?php require 'include/pagination.php'; ?>
    <?php endif; ?>
</div>
<?php require 'include/footer.php' ?>

<!-- Bootstrap Bundle JS (Popper included) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
