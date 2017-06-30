<html>
	<head>
		<title>Setlist.FMI</title>
	</head>
	<body>
		<h1 class="heading">Setlist.FMI</h1>
		<p>
			<?php
				$user_email = '';
				if (array_key_exists('user_email', $_SESSION)) {
					$user_email = $_SESSION['user_email'];
				}
				if ($user_email) {
					echo "Hello, $user_email | <a href=\"index.php?q=users/logout\">Log out</a>";
				} else {
					echo '<a href="index.php?q=users/login">Log in</a>';
					echo ' <a href="index.php?q=users/register">Register</a>';
				}
			?>
		</p>
		<nav class="top-nav">
			<a href="index.php">Home</a>
			<a href="index.php?q=videos/all">Лекции</a>
			<a href="index.php?q=videos/add">Добави лекция</a>
		</nav>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="app/views/layout.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $style; ?>">
		<?php echo $content; ?>
	</body>
</html>