<?php
require 'include/init.php';

// $_SESSION['is_logged_in'] = true; // for testing purposes

if($_SERVER['REQUEST_METHOD']=='POST')
{
    try {
        $conn = require 'include/db.php';

        if (User::authenticate($conn, $_POST['username'], $_POST['password'])) {
            Auth::login();
            Url::redirect('/');
        } else {
            // To provide more debug info, let's check if the user exists
            $sql = "SELECT * FROM user WHERE username = :username";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->fetch()) {
                $error = "Login incorrect: Invalid password.";
            } else {
                $error = "Login incorrect: User not found.";
            }
        }
    } catch (Exception $e) {
        $error = "An error occurred: " . $e->getMessage();
    }
}

?>
<?php require 'include/header.php' ?>

	<?php if (!empty($error)): ?>
		<p><?= $error ?></p>
	<?php endif; ?>

	<h2>Login</h2>
	<form action="" method="post">
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="form-control">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control">
		</div>
		<button class="btn">Log In</button>
	</form>

<?php require 'include/footer.php' ?>
