<?php require 'include/init.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer-master/src/Exception.php';
require 'vendor/PHPMailer-master/src/PHPMailer.php';
require 'vendor/PHPMailer-master/src/SMTP.php';

$email = '';
$subject = '';
$message = '';
$sent = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	$errors = [];

	if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
		$errors[] = 'Please enter a valid email address';
	}

	if ($subject == '') {
		$errors[] = 'Please enter subject';
	}

	if ($message == '') {
		$errors[] = 'Please enter a message';
	}

	if (empty($errors)) {

		$mail = new PHPMailer(true);
		try
		{
			$mail->isSMTP();
			$mail->Host = SMTP_HOST;
			$mail->SMTPAuth = true;
			$mail->Username = SMTP_USER;
			$mail->Password = SMTP_PASS;
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;

			$mail->setFrom('from@example.com');
			$mail->addAddress('ellen@example.com');
			$mail->addReplyTo($email);
			$mail->Subject = $subject;
			$mail->Body = $message;

			$mail->send();

			$sent = true;
		}
		catch(Exception $e)
		{
			$errors[] = $mail->ErrorInfo;
		}

	}
}

?>


<?php require 'include/header.php'; ?>

<h2 class="my-4 mb-4 text-center fw-bold">Contact</h2>

<?php if ($sent) : ?>
    <div class="alert alert-success text-center fw-semibold">Message sent.</div>
<?php else: ?>
    <?php if (! empty($errors)) : ?>
        <div class="alert alert-danger">
            <ul class="mb-0 ps-3">
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" id="formContact" class="mx-auto" style="max-width: 500px;">
        <div class="mb-3">
            <label for="email" class="form-label">Your email</label>
            <input class="form-control" name="email" id="email" type="email" placeholder="Your email" value="<?= htmlspecialchars($email) ?>">
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input class="form-control" name="subject" id="subject" placeholder="Subject" value="<?= htmlspecialchars($subject) ?>">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" name="message" id="message" placeholder="Message" rows="6"><?= htmlspecialchars($message) ?></textarea>
        </div>
        <button class="btn btn-primary w-100">Send</button>
    </form>
<?php endif; ?>


<?php require 'include/footer.php'; ?>
