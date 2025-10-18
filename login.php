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

<div class="mx-auto" style="max-width: 420px;">
    <div class="card shadow-sm border-0 p-4 my-5">
        <h2 class="fw-bold mb-3 text-center">Login</h2>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form action="" method="post" id="formLogin">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input 
                    type="text" 
                    name="username"
                    id="username"
                    class="form-control"
                    placeholder="Enter your username"
                    required
                    autofocus
                    value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    name="password"
                    id="password"
                    class="form-control"
                    placeholder="Enter your password"
                    required
                >
            </div>
            <button class="btn btn-primary w-100 fw-semibold">Log In</button>
        </form>
    </div>
</div>

<?php require 'include/footer.php' ?>
