<?php

session_start();

// лічильник для id в масиві сесії

if (!isset($_SESSION['count'])) {
	$_SESSION['count'] = 1;
} else {
	$_SESSION['count']++;
}

$id = $_SESSION['count'];

// якщо не пуста передача поля email то створюємо сесію

if (isset($_POST['email'])) {
	$_SESSION['is_login'] = true;
	
	$_SESSION['user'][] = [
		'id' => $id,
		'email'=> $_POST['email'],
		'password'=> $_POST['pass'],
	];
	
};

// var_dump($_SESSION);

// session_destroy();


// отримуємо дані з форми, перевіряємо що не пусті

$email = isset($_POST['email']) ? $_POST['email'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

// задамо умовно що пароль має бути 123456 
// передаємо дані сесії

if ($pass == '123456') {
	$data = ['success' => true, 'email' => 'Ви намагались залогінитись з ' . $email, 'login' => $_SESSION['is_login'], 'user' => json_encode($_SESSION['user'])];
	echo json_encode($data);
	// записуєму cookie is_user
	setcookie('is_user',1,0,'/');
    die;
} else {
	$data = ['success' => false, 'error' => 'Пароль невірний'];
	echo json_encode($data);
	// стираємо cookie is_user
	setcookie('is_user',null,-1,'/');
    die;
};

