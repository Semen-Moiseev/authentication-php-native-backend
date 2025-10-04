# authentication-php-native-backend <ins>***EN***</ins>

User authentication system in native PHP with registration, authorization and personal account

## Project Description

_Brief description of the project:_

The project is a native PHP user authentication system. A registration form has been implemented with email and phone uniqueness validation and password match verification. The authorization system supports logging in by email or phone with Yandex SmartCaptcha integration to protect against bots. A secure profile page has been created, accessible only to authorized users, with the functionality of editing personal data. All solutions are implemented in pure PHP without using frameworks, with its own validation and error handling system.

_The detailed terms of reference:_

Write registration forms, authorization, profile page:
- In the registration form, the user must provide a Name, phone number, email, password, and repeat password.
- Mail, login, and phone number must be unique, and if they already exist in the database, notify the user about it.
- Passwords in both fields must match, otherwise notify the user about it.
- Authorization is possible by phone or email (in one field) and password, you need to add Yandex SmartCaptcha during authorization. - Create a page that only authorized users have access to.

Unauthorized users should be redirected to the main page. On this page, users can change their personal information (name, phone, email, password).

Everything should be done using native php, without using third-party languages and frameworks.

## Technologies used

- PHP 8.4.0
- MySQL 8.0.43

----------------------------------------------------------------------------
# authentication-php-native-backend <ins>***RU***</ins>

Система аутентификации пользователей на нативном PHP с регистрацией, авторизацией и личным кабинетом

## Описание проекта

_Краткое описание проекта:_

Проект представляет собой нативную PHP-систему аутентификации пользователей. Реализована форма регистрации с валидацией уникальности email, телефона и проверкой совпадения паролей. Система авторизации поддерживает вход по email или телефону с интеграцией Yandex SmartCaptcha для защиты от ботов. Создана защищенная страница профиля, доступная только авторизованным пользователям, с функционалом редактирования личных данных. Все решения реализованы на чистом PHP без использования фреймворков, с собственной системой валидации и обработки ошибок.

_Подробное техническое задание:_

Написать формы регистрации, авторизации, страницу профиля:
- В форме регистрации пользователь должен указать Имя, телефон, почту, пароль и повтор пароля.
- Почта, логин  и телефон должны быть уникальны и если такие в базе уже есть - уведомлять пользователя об этом.
- Пароли в обоих полях должны совпадать, иначе уведомлять пользователя об этом.
- Авторизация возможна по телефону или email (в одном поле) и паролю, необходимо добавить Yandex SmartCaptcha при авторизации. - Сделать страницу, к которой только авторизованные пользователи имеют доступ.

Неавторизованные пользователи должны перенаправляться на главную страницу. На этой странице пользователи могут менять свою личную информацию (имя, телефон, почта, пароль).

Всё должно быть выполнено с использованием нативного php, без использования сторонних языков и фреймворков.

## Используемые технологии

- PHP 8.4.0
- MySQL 8.0.43
