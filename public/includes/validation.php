<?php

// Функция для валидации регистрации
function invalidateRegistration($name, $email, $phone, $password, $confirm_password) {

	// Проверка имени
	if(strlen($name) < 3 || strlen($name) > 30) {
		return "Имя пользователя должно быть от 3 до 30 символов";
	}

	if(!preg_match('/^[a-zA-Zа-яА-я]/u', $name)) {
		return "Имя пользователя может содержать только буквы";
	}

	// Проверка электронной почты
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return "Неверный формат электронной почты";
	}

	// Проверка телефона
	if (!preg_match('/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/', $phone)) {
		return "Неверный формат номера телефона (Например: +79998887766)";
	}

	// Проверка пароля
	if($password != $confirm_password) {return "Пароли не совпадают";
	}

	if(strlen($password) < 8) {
		return "Пароль должен содержать минимум 8 символов";
	}

	if(!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[\W_]/', $password)) {
		return "Пароль должен содержать хотя бы одну заглавную и одну строчную букву, хотя бы одну цифру и хотя бы один спецсимвол";
	}

	if(stripos($password, $name) !== false || stripos($password, $email) !== false) {
		return "Пароль не должен совпадать с именем пользователя или почтой";
	}

	return "";
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