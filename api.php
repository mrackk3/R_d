<?php

// отримуємо дані з форми, перевіряємо що не пусті

$email = isset($_POST['email']) ? $_POST['email'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

// задамо умовно що пароль має бути 123456 

if ($pass == '123456') {
	$data = ['success' => true, 'email' => 'Ви намагались залогінитись з ' . $email];
	echo json_encode($data);
    die;
} else {
	$data = ['success' => false, 'error' => 'Пароль невірний'];
	echo json_encode($data);
    die;
}