<?php
require '../include/init.php';
Auth::requireLogin();

$conn = require '../include/db.php';
$article = new Article();
$category_ids = [];
$categories = Category::getAll($conn);
$image_upload_dir = dirname(__DIR__) . '/uploads/';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assign form values to Article
    $article->title = $_POST['title'] ?? '';
    $article->content = $_POST['content'] ?? '';
    $article->published_at = $_POST['published_at'] ?? null;
    $category_ids = $_POST['category'] ?? [];

    // Validate the date/time value for HTML5 datetime-local ("Y-m-d\TH:i")
    if (!empty($article->published_at)) {
        $dt = DateTime::createFromFormat('Y-m-d\TH:i', $article->published_at);
        if ($dt) {
            $article->published_at = $dt->format('Y-m-d H:i:s'); // For MySQL DATETIME format, if needed
        } else {
            $article->errors[] = 'Invalid publication date/time format.';
        }
    } else {
        $article->published_at = null;
    }

    // Handle image upload if file sent
    if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] !== UPLOAD_ERR_NO_FILE) {
        $image_file = $_FILES['image_file'];

        if ($image_file['error'] === UPLOAD_ERR_OK) {
            if ($image_file['size'] > 5 * 1024 * 1024) {
                $article->errors[] = 'Image file size must be less than 5MB.';
            } else {
                $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                $mime = mime_content_type($image_file['tmp_name']);

                if (!in_array($mime, $allowed_types)) {
                    $article->errors[] = 'File must be an image.';
                } else {
                    $ext = pathinfo($image_file['name'], PATHINFO_EXTENSION);
                    $safe_ext = preg_replace('/[^a-zA-Z0-9]/', '', $ext);
                    $image_name = uniqid('img_') . '.' . $safe_ext;
                    $image_path = $image_upload_dir . $image_name;

                    if (move_uploaded_file($image_file['tmp_name'], $image_path)) {
                        $article->image_file = $image_name;
                    } else {
                        $article->errors[] = 'Image upload failed.';
                    }
                }
            }
        } else {
            $article->errors[] = 'An error occurred during image upload.';
        }
    }

    // Save article if no errors
    if (empty($article->errors)) {
        if ($article->create($conn)) {
            $article->setCategories($conn, $category_ids);
            // Update image_file after insert
            if ($article->image_file) {
                $stmt = $conn->prepare("UPDATE article SET image_file = :image_file WHERE id = :id");
                $stmt->execute([
                    ':image_file' => $article->image_file,
                    ':id' => $article->id
                ]);
            }
            Url::redirect("/admin/article.php?id={$article->id}");
        }
    }
}

// Format $article->published_at for <input type="datetime-local">
$published_at_value = '';
if (!empty($article->published_at)) {
    // If just set, it will be in MySQL format; otherwise, keep as posted value
    $dt = DateTime::createFromFormat('Y-m-d H:i:s', $article->published_at);
    if ($dt) {
        $published_at_value = $dt->format('Y-m-d\TH:i');
    } else {
        $published_at_value = htmlspecialchars($article->published_at);
    }
}
?>
<?php require '../include/header.php'; ?>
<div class="mx-auto" style="max-width: 720px;">
    <div class="card shadow-sm border-0 p-4 my-4">
        <h2 class="fw-bold mb-3">New Article</h2>
        <?php if (!empty($article->errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($article->errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="post" id="formArticle" class="mx-auto" style="max-width: 600px;" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input class="form-control" type="text" name="title" id="title" placeholder="Article Title" value="<?= htmlspecialchars($article->title); ?>" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" rows="5" id="content" placeholder="Article Content" required><?= htmlspecialchars($article->content) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="published_at" class="form-label">Publication Date & Time</label>
                <input class="form-control" type="datetime-local" name="published_at" id="published_at"
                    value="<?= $published_at_value ?>">
            </div>
            <div class="mb-3">
                <label for="image_file" class="form-label">Article Image</label>
                <input class="form-control" type="file" name="image_file" id="image_file" accept="image/*">
                <?php if (!empty($article->image_file)): ?>
                    <img src="/uploads/<?= htmlspecialchars($article->image_file) ?>" class="img-thumbnail mt-2" style="max-width: 180px;" alt="Current Image">
                <?php endif; ?>
            </div>
            <fieldset class="mb-3">
                <legend class="col-form-label pt-0">Categories</legend>
                <?php if (count($categories) > 0): ?>
                    <?php foreach ($categories as $category): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="category[]" value="<?= $category['id'] ?>" id="category<?= $category['id'] ?>" <?= in_array($category['id'], $category_ids) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="category<?= $category['id'] ?>">
                                <?= htmlspecialchars($category['name']) ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="text-danger small ps-1">No categories found. Please add a category first.</div>
                <?php endif; ?>
            </fieldset>
            <button class="btn btn-primary w-100">Save Article</button>
        </form>
    </div>
</div>
<?php require '../include/footer.php'; ?>
