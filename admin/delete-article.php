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

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if($article->delete($conn))
		{
			Url::redirect("/admin/index.php");
			// redirect("/admin/index.php");
		}
	}
?>

<?php require '../include/header.php'; ?>

	<h2>Delete Article</h2>
	<form method="post">
		<p>Are You Sure?</p>
		<button>Delete</button>
		<a href="article.php?id=<?= $article->id;?>">Cancel</a>
	</form>

<?php require '../include/footer.php'; ?>
