<?php

/* Задаем переменные */
$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$tel = htmlspecialchars($_POST["tel"]);
$message = htmlspecialchars($_POST["message"]);
$bezspama = htmlspecialchars($_POST["bezspama"]);

/* Ваш адрес и тема сообщения */
$address = "meshanya93@gmail.com";
$sub = "Сообщение с сайта iHiFi";

/* Формат письма */
$mes = "Сообщение с сайта iHiFi.\n
Имя отправителя: $name 
Электронный адрес отправителя: $email
Телефон отправителя: $tel
Текст сообщения:
$message";


if (empty($bezspama)) /* Оценка поля bezspama - должно быть пустым*/
{
/* Отправляем сообщение, используя mail() функцию */
$from = "Reply-To: $email \r\n";
if (mail($address, $sub, $mes, $from)) {
	header('Refresh: 3; URL=https://ihifi.ru/index.html');
	echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <form>Письмо отправлено, благодарим Вас за уделенное время</form>';}
else {
	header('Refresh: 3; URL=https://ihifi.ru/index.html');
	echo '<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <form>Письмо не отправлено, пожалуйста, свяжитесь с нами любым другим способом</form>';}
}
exit; /* Выход без сообщения, если поле bezspama чем-то заполнено */
?>