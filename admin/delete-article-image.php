<?php

require '../include/init.php';
Auth::requireLogin();
// PDO check PDO comments and look back earlier codes in project
$conn = require '../include/db.php';

if (isset($_GET['id']))  // validate the query_string
{

	$article = Article::getByID($conn, $_GET['id']);	// PDO (function calling from Article class)

	if(!$article)
	{
		die("Article not found.");
	}

} else {
	die("id not supplied, article not found.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

				$previous_image = $article->image_file;

				if($article->getImageFile($conn, null))
				{
					if ($previous_image) {
						unlink("../uploads/$previous_image");
					}
					Url::redirect("/admin/edit-article-image.php?id={$article->id}");
				}
			}

?>

<?php require '../include/header.php' ?>

<h2>Delete Article Image</h2>

	<?php if ($article->image_file): ?>
		<img src="/uploads/<?= $article->image_file; ?>" alt="Content Image" height="240" width="360">
	<?php endif; ?>

	<form method="post">
		<p>Are you sure?</p>

		<button>Delete</button>
		<a href="edit-article-image.php?id=<?= $article->id; ?>">Cancel</a>
	</form>

<?php require '../include/footer.php' ?>
