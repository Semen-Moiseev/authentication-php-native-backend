<?php

const DB_HOST = 'MySQL-8.0';
const DB_NAME = 'mini-profile';
const DB_USER = 'root';
const DB_PASS = '';

//Подключение к БД
function getDB(): bool|mysqli {
	return mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
}