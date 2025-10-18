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

				<article class="">
					<h2><?= htmlspecialchars($article[0]['title']); ?></h2>

					<time datetime="<?= $article[0]['published_at'] ?>">
						<?php
								$datetime = new DateTime($article[0]['published_at']);
								echo $datetime->format("j F, Y");
						?>
					</time>

					<?php if ($article[0]['category_name']): ?>
						<p>Categories:
							<?php foreach ($article as $a): ?>
								<?= htmlspecialchars($a['category_name']); ?>
							<?php endforeach; ?>
						</p>
					<?php endif; ?>

					<?php if ($article[0]['image_file']): ?>
						<img src="/uploads/<?= $article[0]['image_file']; ?>" alt="Content Image" height="240" width="360">
					<?php endif; ?>
					<p><?= htmlspecialchars($article[0]['content']); ?></p>
				</article>

			<?php else: ?>
				<p>No Article found.</p>
			<?php endif; ?>
<?php require 'include/footer.php'; ?>
