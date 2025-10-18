<?php
require '../include/init.php';

Auth::requireLogin();

$conn = require '../include/db.php';

// $paginator = new Paginator(isset($_GET['page']) ? $_GET['page'] : 1, 5); // by using ternary operator
$paginator = new Paginator($_GET['page'] ?? 1, 7, Article::getTotal($conn));	 // php Null coalescing operator [if $_GET['page'] exist then it will show else other] + Total number of content

$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);		// Show articles with page containing 5 article limit and 0 offset value

?>


<?php require '../include/header.php'; ?>
<h2>Administrator</h2>

<p><a href="new-article.php">Add New Article</a></p>

			<?php if (empty($articles)): ?>
				<p>Oops!.No articles are there.</p>
			<?php else: ?>
				<table class="table">
					<thead>
						<th>Title</th>
						<th>Published at</th>
					</thead>
						<tbody>
							<?php foreach ($articles as $article): ?>
								<tr>
									<td>
										<a href="article.php?id=<?= $article['id']; ?>"><?= htmlspecialchars($article['title']); ?></a>
									</td>
									<td>
										<?php if ($article['published_at']): ?>
											<time><?= $article['published_at'] ?></time>
										<?php else: ?>
												Unpublished
												<button class="btn publish" data-id="<?= $article['id'] ?>">Publish</button>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
				</table>

				<?php require '../include/pagination.php'; ?>

			<?php endif; ?>
<?php require '../include/footer.php' ?>
