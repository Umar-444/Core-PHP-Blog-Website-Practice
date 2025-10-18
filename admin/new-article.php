<?php
require '../include/init.php';

Auth::requireLogin();

	$article =  new Article();

	$category_ids = [];  // as there is no category initially so we initialise it with empty array

	$conn = require '../include/db.php';

	$categories = Category::getAll($conn);

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$article->title = $_POST['title'];
		$article->content = $_POST['content'];
		$article->published_at = $_POST['published_at'];

		$category_ids = $_POST['category'] ?? [];

		if($article->create($conn)){
			$article->setCategories($conn, $category_ids);
			Url::redirect("/admin/article.php?id={$article->id}"); // relative path
			}
	}

?>

<?php require '../include/header.php' ?>

<h2>New Article</h2>

<?php require 'include/article-form.php'; ?>

<?php require '../include/footer.php' ?>
