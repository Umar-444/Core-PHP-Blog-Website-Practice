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
//	var_dump($_FILES);

		try {

			if (empty($_FILES)) {
				throw new Exception("Invalid Upload");

			}

			switch ($_FILES['file']['error']) {
				case UPLOAD_ERR_OK:
					break;

				case UPLOAD_ERR_NO_FILE:
					throw new Exception('No File Uploaded');
					break;

				case UPLOAD_ERR_INI_SIZE:
					throw new Exception('File is too Large(From the Server SEttings)');
					break;

				default:
					throw new Exception('An error occured');
			}
			if ($_FILES['file']['size']>5000000) {
				throw new Exception("File is too large (Please Upload Upto 5MB)");
			}

			$mime_types = ['image/gif', 'image/png', 'image/jpeg'];

			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$mime_type = finfo_file($finfo, $_FILES['file']['tmp_name']);

			if (!in_array($mime_type, $mime_types)) {
				throw new Exception("Invalid file type");

			}

			// Move Uplodaded File
			$pathinfo = pathinfo($_FILES["file"]["name"]);

			$base = $pathinfo['filename'];

			$base = preg_replace('/[^a-zA-Z0-9_-]/', '_', $base);		// replace any characters that aren't letters, numbers, undercore or hyphen with an underscrore

			$base = mb_substr($base, 0, 200);	// getting part of string from start and upto 200 characters

			$filename = $base . "." . $pathinfo['extension'];

			$destination = "../uploads/$filename";

			$i = 1;
			while (file_exists($destination)) {
				$filename = $base . "-$i." . $pathinfo['extension'];
				$destination = "../uploads/$filename";

				$i++;
			}

			if(move_uploaded_file($_FILES['file']['tmp_name'], $destination))
			{
				$previous_image = $article->image_file;

				if($article->getImageFile($conn, $filename))
				{
					if ($previous_image) {
						unlink("../uploads/$previous_image");
					}
					Url::redirect("/admin/edit-article-image.php?id={$article->id}");
				}
			} else {
				throw new Exception("Can't be uploaded");

			}

		} catch (Exception $e) {
				$error = $e->getMessage();
		}
}

?>

<?php require '../include/header.php' ?>

<h2>Edit Article Image</h2>

	<?php if ($article->image_file): ?>
		<img src="/uploads/<?= $article->image_file; ?>" alt="Content Image" height="240" width="360">
		<a class="delete" href="delete-article-image.php?id=<?= $article->id; ?>">Delete</a>
	<?php endif; ?>

	<?php if (isset($error)): ?>
		<p><?= $error ?></p>
	<?php endif; ?>

	<form method="post" enctype="multipart/form-data">
		<div>
			<label for="file">Image Upload</label>
			<input type="file" name="file" id="file">
		</div>
		<button>Upload</button>
	</form>

<?php require '../include/footer.php' ?>
