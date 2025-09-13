<?php
session_start();
require_once('../includes/auth.php')
?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Профиль</title>
	</head>
	<body>
		<main>
			<h1>Личный профиль пользователя</h1>
			<br />

			<p>
				<strong>Имя: </strong>
				<?php echo $_SESSION['user_name'] ?>
			</p>
			<p>
				<strong>Email: </strong>
				<?php echo $_SESSION['user_email'] ?>
			</p>
			<p>
				<strong>Номер телефона: </strong>
				<?php echo $_SESSION['user_phone'] ?>
			</p>

			<h2>Редактирование данных</h2>
			<form method="POST" action="../backend/action_profile.php">
				<label>Новое имя: </label>
				<input type="text" name="name" value="<?php echo $_SESSION['user_name'] ?>" required />
				<br /><br />

				<button type="submit">Сохранить</button>
			</form>

			<p><a href="../backend/logout.php">Выйти</a></p>
		</main>
	</body>
</html>
