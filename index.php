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
            background-color: #f8fafc;
        }
        .container-index {
            margin-top: 40px;
            margin-bottom: 60px;
            max-width: 1050px;
        }
        .article-card {
            display: flex;
            flex-direction: row;
            box-shadow: 0 4px 24px rgba(80,120,180,0.09);
            border-radius: 15px;
            margin-bottom: 32px;
            background: #fff;
            transition: transform 0.13s, box-shadow 0.13s;
            border: 1.5px solid #e1e7ec;
            overflow: hidden;
            min-height: 210px;
            position: relative;
        }
        .article-card:hover {
            transform: translateY(-3px) scale(1.012);
            box-shadow: 0 12px 36px rgba(24,58,80,0.14);
            border-color: #dee6ef;
        }
        .article-image-col {
            flex: 0 0 260px;
            max-width: 260px;
            background: linear-gradient(115deg, #f2f4f8 60%, #e3ecfa 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            border-right: 1.5px solid #e1e7ec;
        }
        .article-image {
            width: 210px;
            height: 160px;
            object-fit: cover;
            object-position: center;
            border-radius: 10px;
            box-shadow: 0 2px 14px 0 rgba(80,120,180,0.07);
            background: #f1f3f6;
        }
        .article-content-col {
            flex: 1 1 0%;
            padding: 1.5rem 1.85rem 1.13rem 2.1rem;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }
        .article-header {
            display: flex;
            flex-direction: column;
            gap:8px;
        }
        .article-title {
            font-size: 1.37rem;
            font-weight: 700;
            margin-bottom: 2px;
            color: #213653;
            transition: color 0.1s;
            text-decoration: none;
        }
        .article-title:hover,
        .article-title:focus {
            color: #1769c2;
        }
        .article-meta {
            font-size: 0.97rem;
            font-weight: 500;
            color: #8b9abc;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .article-categories {
            margin: 9px 0 13px 0;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }
        .category-badge {
            margin-right: 6px;
            margin-bottom: 5px;
            margin-top: 3px;
            background: linear-gradient(89deg, #eaf1fb 66%, #d2e2f5 100%);
            color: #1769c2;
            font-weight: 500;
            font-size: 0.98rem;
            border-radius: 13px;
            padding: 3.5px 16px;
            border: 1px solid #e2ecfa;
            box-shadow: none;
        }
        .article-excerpt {
            color: #445161;
            font-size: 1.09rem;
            margin-bottom: 0;
            /* Limit to two lines */
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        @media (max-width: 900px) {
            .container-index {
                max-width: 97vw;
            }
            .article-card {
                flex-direction: column;
                min-height: unset;
            }
            .article-image-col {
                max-width: 100%;
                border-right: none;
                border-bottom: 1.5px solid #e1e7ec;
                justify-content: flex-start;
                padding: 20px 0 0 0;
            }
            .article-content-col {
                padding: 1.4rem 1.25rem 1rem 1.25rem;
            }
        }
        @media (max-width: 540px) {
            .article-image {
                width: 100%;
                height: 128px;
            }
            .article-content-col {
                padding: 1.09rem .6rem 0.75rem 1rem;
            }
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

<div class="container container-index px-2 px-md-4">
    <h1 class="mb-4 text-center fw-bold" style="letter-spacing: -1px; color:#27597a;">Latest Articles</h1>
    <?php if (empty($articles)): ?>
        <div class="no-articles mx-auto">
            <h3 class="mb-2">😢 Oops! No articles are there.</h3>
            <p>Please check back soon.</p>
        </div>
    <?php else: ?>
        <div class="list-unstyled">
        <?php foreach ($articles as $article): ?>
            <div class="article-card">
                <?php if (!empty($article['image_file'])): ?>
                    <div class="article-image-col py-3 px-2">
                        <a href="article.php?id=<?= $article['id']; ?>">
                            <img 
                                src="/uploads/<?= htmlspecialchars($article['image_file']) ?>" 
                                alt="<?= htmlspecialchars($article['title']) ?>"
                                class="article-image shadow-sm"
                            >
                        </a>
                    </div>
                <?php else: ?>
                    <div class="article-image-col py-3 px-2" style="align-items:center; background:linear-gradient(115deg, #f5f7fa 70%, #eaf1fb 100%);">
                        <span class="text-secondary text-center w-100" style="font-size:1.6rem;">
                            <svg width="50" height="50" fill="#bbcadb" viewBox="0 0 16 16"><path d="M14.002 3H1.998A.997.997 0 0 0 1 3.995v8.01a.997.997 0 0 0 .998.995h12.004a.997.997 0 0 0 .998-.995v-8.01A.997.997 0 0 0 14.002 3zm0 1 .002 2.01-2.562 2.093-2.076-2.704a.4.4 0 0 0-.624 0L7 7.37 5.662 5.924l-2.657 2.179V4h11zm0 9H1.998A.997.997 0 0 1 1 12.005v-6.23l3.326 2.726a.4.4 0 0 0 .528.016l2.02-1.617 2.075 2.704a.4.4 0 0 0 .625 0l2.458-2.011V12.005a.997.997 0 0 1-.998.995z"/></svg>
                        </span>
                    </div>
                <?php endif; ?>
                <div class="article-content-col">
                    <div class="article-header">
                        <a class="article-title" href="article.php?id=<?= $article['id']; ?>">
                            <?= htmlspecialchars($article['title']); ?>
                        </a>
                        <div class="article-meta">
                            <span>
                                <svg width="15" height="15" fill="#b3bfd4" style="margin-right:3px;" viewBox="0 0 16 16"><path d="M8 3.993a4.01 4.01 0 1 1 0 8.02 4.01 4.01 0 0 1 0-8.02zm0-1.493A5.493 5.493 0 1 0 8 14.493 5.493 5.493 0 0 0 8 2.5zm.5 4.603V8.37a.5.5 0 0 1-.146.354l-1.5 1.5a.5.5 0 1 1-.708-.708l1.354-1.353V7.103a.5.5 0 0 1 1 0z"/></svg>
                                <time datetime="<?= $article['published_at'] ?>">
                                    <?php
                                        $datetime = new DateTime($article['published_at']);
                                        echo $datetime->format("j F, Y");
                                    ?>
                                </time>
                            </span>
                            <span>
                                <svg width="14" height="14" fill="#cad7ee" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.32-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.63.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                                <span class="ms-1">Featured</span>
                            </span>
                        </div>
                        <?php if ($article['category_names']): ?>
                            <div class="article-categories">
                                <?php foreach ($article['category_names'] as $name): ?>
                                    <span class="badge category-badge"><?= htmlspecialchars($name); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <p class="article-excerpt"><?= nl2br(htmlspecialchars(mb_strimwidth($article['content'], 0, 325, '...'))); ?></p>
                    <div class="mt-3">
                        <a href="article.php?id=<?= $article['id']; ?>" class="btn btn-outline-primary btn-sm shadow-sm rounded-pill px-4 py-1 fw-semibold">
                            Read More
                        </a>
                    </div>
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
