<?php

// отримуємо дані з форми, перевіряємо що не пусті

$email = isset($_POST['email']) ? $_POST['email'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

$delimeter = '|';

$string = $email . $delimeter . $pass . PHP_EOL;

// записуємо дані в файл багаторазово

file_put_contents(dirname(__FILE__) . '/data.txt', $string, FILE_APPEND);

// читаємо дані з файлу

$file = fopen(dirname(__FILE__) . '/data.txt','r') or die;

// лічильник для id

$count = 1;

while (!feof($file)) {

    $readFile = fgets($file);
    $dataString = explode("|", $readFile);

    // лічильник для id

    $id = $count++;

    $users[] = [
        "id"=> $id,
        'email_from_file' => $field1 = $dataString[0],
        'pass_from_file'=> @$field2 = $dataString[1]
    ];
    
}

fclose($file);

// задамо умовно що пароль має бути 123456 

if ($pass == '123456') {

    $data = ['success' => true, 'email' => 'Ви намагались залогінитись з ' . $email, 'user' => json_encode($users)];
	echo json_encode($data);

    die;

} else {

	$data = ['success' => false, 'error' => 'Пароль невірний'];

    // якщо умова не виповнюється то стираємо дані в файлі

    file_put_contents(dirname(__FILE__) . '/data.txt', '');

	echo json_encode($data);

    die;

};