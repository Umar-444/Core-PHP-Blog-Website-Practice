<?php

require '../include/init.php';

Auth::requireLogin();

$conn = require '../include/db.php';

$article = Article::getByID($conn, $_POST['id']);

$published_at = $article->publish($conn);

?><time><?= $published_at ?></time>