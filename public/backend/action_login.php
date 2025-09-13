<?php
session_start();
require_once('../config/db.php');

// Обработка формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Подключение к БД
	$conn = getDB();
	if(!$conn) {
		exit("Ошибка подключения к БД: " . $conn->connect_error);
	}

	// Получение данных из формы входа
	$login = $_POST['login'] ?? '';
	$password = $_POST['password'] ?? '';

	// Достаем пароль из БД
	$stmt = $conn->prepare("SELECT id, name, email, phone, password FROM User WHERE email = ? OR phone = ?"); // Подготовка SQL запроса
	$stmt->bind_param("ss", $login, $login); // Привязка переменных к SQL запросу
	$stmt->execute(); // Выполнение запроса
	$stmt->bind_result($id, $name, $email, $phone, $password_hash); // Привязка переменных к результату
	$stmt->fetch(); // Достать строку результата и передает в переменные из bind_result()

	$stmt->close();
	$conn->close();

	// Проверка введенных данных
	if($password_hash && password_verify($password, $password_hash)) {
		$_SESSION['user_id'] = $id;
		$_SESSION['user_name'] = $name;
		$_SESSION['user_email'] = $email;
		$_SESSION['user_phone'] = $phone;
		header("Location: ../frontend/profile.php");
		exit;
	}
	else {
		echo "<script> alert('Неверный логин или пароль. Повторите попытку');
		location.href='../frontend/login.html';</script>";
		exit;
	}
}
