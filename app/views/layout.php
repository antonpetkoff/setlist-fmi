<html>
	<head>
		<title>Setlist.FMI</title>
	</head>
	<body>
		<div class="heading">
			<h1>Setlist.FMI</h1>
			<div class="user-entrance">
				<?php
					$user_email = '';
					if (array_key_exists('user_email', $_SESSION)) {
						$user_email = $_SESSION['user_email'];
					}
					if ($user_email) {
						echo "Здравей, $user_email | <a class=\"button\" href=\"index.php?q=users/logout\">Изход</a>";
					} else {
						echo '<a class="button" href="index.php?q=users/login">Вход</a>';
						echo ' <a class="button" href="index.php?q=users/register">Регистрация</a>';
					}
				?>
			</div>
		</div>
		<nav class="top-nav">
			<a class="button" href="index.php">Начало</a>
			<a class="button" href="index.php?q=videos/all">Лекции</a>
			<a class="button" href="index.php?q=videos/add">Добави лекция</a>
		</nav>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="app/views/layout.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $style; ?>">
		<?php echo $content; ?>
	</body>
</html>