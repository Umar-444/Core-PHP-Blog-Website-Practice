<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="/css/jquery.datetimepicker.min.css">
		<link rel="stylesheet" href="/css/styles.css">
		<title>NOTICE BOARD</title>
	</head>
	<body>
		<div class="container">

		<header>
			<h1>COLLEGE NOTICE BOARD</h1>
		</header>

		<nav>
			<ul class="nav">
				<li class="nav-item"><a href="/" class="nav-link">Home</a></li>

				<?php if (Auth::isLoggedIn()): ?>

					<li class="nav-item"><a href="/admin/" class="nav-link">Admin</a></li>

					<li class="nav-item"><a href="/logout.php" class="nav-link">Logout</a></li>

				<?php else: ?>

						<li class="nav-item"><a href="/login.php" class="nav-link">Login</a></li>

				<?php endif; ?>

					<li class="nav-item"><a href="/contact.php" class="nav-link">Contact</a></li>

			</ul>
		</nav>

		<main>

<!-- Note that these links are for temporary purpose using relative links when placing project in htdocs -->
<!--In Production Use Relative paths. Not valid Here because no root directory specified (These Links might not work correctly)
Use These:
'/' for home
'/logout' for logout
'/login' for login
'/admin/' for admin
 -->
