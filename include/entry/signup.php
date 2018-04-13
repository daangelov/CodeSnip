<?php

require_once '../settings.php';

$response = array(
    'st' => 1,
    'msg' => ''
);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fname']) && isset($_POST['lname'])
    && isset($_POST['email']) && isset($_POST['usr']) && isset($_POST['pwd']) && isset($_POST['pwd-conf'])) {

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['usr'];
    $password = $_POST['pwd'];
    $password_confirm = $_POST['pwd-conf'];


    // Check if names are correct
    if (!check_name($firstname)) {
        $response['st'] = 2;
        $response['msg'] .= "Невалидно име.\n";
    }
    if (!check_name($lastname)) {
        $response['st'] = 2;
        $response['msg'] .= "Невалидна фамилия.\n";
    }
    // Check if username is correct
    if (!check_username($username)) {
        $response['st'] = 2;
        $response['msg'] .= "Невалидно потребителско име.\n";
    }
    // Check if email is correct
    if (!check_email($email)) {
        $response['st'] = 2;
        $response['msg'] .= "Невалиден E-mail адрес.\n";
    }

    // Check if password is correct
    if (!check_password($password)) {
        $response['st'] = 2;
        $response['msg'] .= "Невалидна парола. Паролата трябва да е поне 8 символа.\n";
    }
    // Check if password_confirm is the same
    if (empty($password_confirm) || $password_confirm != $password) {
        $response['st'] = 2;
        $response['msg'] .= "Паролите не съвпадат.\n";
    }

    $stmt = $db->prepare('SELECT username, email FROM user WHERE username = ? OR email = ?');
    $stmt->execute([$username, $email]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if record with this username exists
    if ($stmt->rowCount() != 0) {

        if ($result['username'] == $username) {
            $response['st'] = 2;
            $response['msg'] .= "Това потребителското име е заето.\n";
        }
        if ($result['email'] == $email) {
            $response['st'] = 2;
            $response['msg'] .= "Този E-mail адрес вече е използван.\n";
        }
    }

    // If errors exit
    if ($response['st'] == 2) {
        echo json_encode($response);
        exit();
    }

    // Create account
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $db->prepare('INSERT INTO user (username, password, firstname, lastname, email)
        VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$username, $password_hashed, $firstname, $lastname, $email]);

    $response['msg'] = "Успешно се регистрирахте в сайта!";
    echo json_encode($response);
    exit();

} else {
    $response['st'] = 0;
    $response['msg'] = "Моля опитайте отново.";
    echo json_encode($response);
    exit();
}