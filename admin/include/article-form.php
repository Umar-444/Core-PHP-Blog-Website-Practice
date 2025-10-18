<?php if (!empty($article->errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($article->errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form method="post" id="formArticle" class="mx-auto" style="max-width: 600px;" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input class="form-control" type="text" name="title" id="title" placeholder="Article Title" value="<?= htmlspecialchars($article->title); ?>">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" name="content" rows="5" id="content" placeholder="Article Content"><?= htmlspecialchars($article->content) ?></textarea>
    </div>
    <div class="mb-3">
        <label for="published_at" class="form-label">Publication Date & Time</label>
        <input class="form-control" type="datetime-local" name="published_at" value="<?= htmlspecialchars($article->published_at) ?>">
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
        <?php foreach ($categories as $category): ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="category[]" value="<?= $category['id'] ?>" id="category<?= $category['id'] ?>" <?php if (in_array($category['id'], $category_ids)): ?>checked<?php endif; ?>>
                <label class="form-check-label" for="category<?= $category['id'] ?>">
                    <?= htmlspecialchars($category['name']) ?>
                </label>
            </div>
        <?php endforeach; ?>
    </fieldset>
    <button class="btn btn-primary w-100">Save Article</button>
</form>
