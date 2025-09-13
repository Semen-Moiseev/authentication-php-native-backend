<?php

session_start();
require_once('../config/db.php');
require_once('../includes/validation.php');

// Получение данных из формы регистрации
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

// Подключение к БД
$conn = getDB();
if(!$conn) {
	exit("Ошибка подключения к БД: " . $conn->connect_error);
}

// Проверка данных и их запись в БД
if(!invalidateRegistration($name, $email, $phone, $password, $confirm_password)) {
	// Хеширование пароля
	$password_hash = password_hash($password, PASSWORD_BCRYPT);

	$stmt = $conn->prepare("INSERT INTO User (name, email, phone, password) VALUES (?, ?, ?, ?)"); // Подготовка SQL запроса
	$stmt->bind_param("ssss", $name, $email, $phone, $password_hash); // Привязка переменных к SQL запросу

	if($stmt->execute()){
		header('Location: ../frontend/login.html');
		exit;
	}
	else {
		echo "<script> alert('Пользователь с такой почтой или телефоном уже зарегистрирован. Повторите попытку!');
		location.href='../frontend/registration.html';</script>";
		exit;
	}

	$stmt->close();
	$conn->close();
}
else {
	$message = invalidateRegistration($name, $email, $phone, $password, $confirm_password);
	echo "<script type='text/javascript'>alert('$message');
	location.href='../frontend/registration.html';</script>";
	exit;
}
