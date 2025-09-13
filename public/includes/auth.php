<?php

//Проверка пользователя на авторизацию

function checkAuth(): void {
	if(!isset($_SESSION['user_id'])) {
		header("Location: ../login.html");
		exit;
	}
}