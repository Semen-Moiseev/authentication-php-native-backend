<?php

session_start();
require_once('includes/helpers.php');
require_once('includes/auth.php');
checkAuth();

// Обработка формы
if($_SERVER["REQUEST_METHOD"] === "POST") {
	// Подключение к БД
	$conn = getDB();
	if(!$conn) {
		exit("Ошибка подключения к БД: " . $conn->connect_error);
	}

	// Достаем данные из БД
	$stmt = $conn->prepare("SELECT name, email, phone FROM User WHERE id = ?"); // Подготовка SQL запроса
	$stmt->bind_param("i", $_SESSION['user_id']); // Привязка переменных к SQL запросу
	$stmt->execute(); // Выполнение запроса
	$stmt->bind_result($name, $email, $phone); // Привязка переменных к результату
	$stmt->fetch(); // Достать строку результата и передает в переменные из bind_result()
	$stmt->close();

	// Получение данных из формы входа
	$newName = $_POST['name'] ?? '';

	// Проверка введенных данных
	if(!invalidateName($newName)) {
		$update = $conn->prepare("UPDATE User SET name = ? WHERE id = ?");
		$update->bind_param("si", $newName, $_SESSION['user_id']);

		if($update->execute()){
			$_SESSION['user_name'] = $newName;
			$name = $newName;
			header('Location: profile.php');
			exit;
		}
		else {
			echo "<script> alert('Ошибка при обновлении');</script>";
		}

		$conn->close();
	}
	else {
		$message = invalidateName($newName);
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
}

// Функция для валидации имени
function invalidateName($name) {
	if(strlen($name) < 3 || strlen($name) > 30) {
		return "Имя пользователя должно быть от 3 до 30 символов";
	}

	if(!preg_match('/^[a-zA-Zа-яА-я]/u', $name)) {
		return "Имя пользователя может содержать только буквы";
	}

	return "";
}

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
			<h1>Личный профиль пользователя</h1><br>

			<p><strong>Имя: </strong> <?=htmlspecialchars($name);?> </p>
			<p><strong>Email: </strong> <?=htmlspecialchars($email);?> </p>
			<p><strong>Номер телефона: </strong> <?=htmlspecialchars($phone);?> </p>

			<h2>Редактирование данных</h2>
			<form method="POST">
				<label>Новое имя: </label>
				<input type="text" name="name" value="<?=htmlspecialchars($name);?>" required />
				<br /><br />

				<button type="submit">Сохранить</button>
			</form>

			<p><a href="src/logout.php">Выйти</a></p>
		</main>
	</body>
</html>
