<?php

require_once '../settings.php';

$response = array(
    'st' => 1,
    'msg' => ''
);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['usr']) && isset($_POST['pwd'])) {

    $username = trim($_POST['usr']);
    $password = trim($_POST['pwd']);

    // Check if valid input is provided
    if (!check_username($username) || !check_password($password)) {
        $response['st'] = 2;
        $response['msg'] = 'Потребителското име и паролата са грешни или не съвпадат!';
        echo json_encode($response);
        exit();
    }

    // Select the user with this username from database
    $stmt = $db->prepare('SELECT id, username, password, firstname, lastname, email, status, type
        FROM user WHERE username = ?');
    $stmt->execute([$username]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    // Check if username exists
    if ($stmt->rowCount() != 1) {
        $response['st'] = 2;
        $response['msg'] = 'Потребителското име и паролата са грешни или не съвпадат!';

        $stmt = $db->prepare('INSERT INTO login_log (username, ip_address, status) VALUES (?, ?, ?)');
        $stmt->execute([$username, $_SERVER['REMOTE_ADDR'], 'Username does not exist']);

        echo json_encode($response);
        exit();
    }
    // Username exists

    // Check if password matches
    if (!password_verify($password, $user['password'])) {
        $response['st'] = 2;
        $response['msg'] = 'Потребителското име и паролата са грешни или не съвпадат!';

        $stmt = $db->prepare('INSERT INTO login_log (username, ip_address, status) VALUES (?, ?, ?)');
        $stmt->execute([$username, $_SERVER['REMOTE_ADDR'], 'Wrong password']);

        echo json_encode($response);
        exit();
    }
    // Password matches

    // Check if the user is confirmed
    if ($user['status'] == 0) {
        $response['st'] = 2;
        $response['msg'] = 'Този акаунт не е потвърден!';

        $stmt = $db->prepare('INSERT INTO login_log (username, ip_address, status) VALUES (?, ?, ?)');
        $stmt->execute([$username, $_SERVER['REMOTE_ADDR'], 'Not confirmed']);

        echo json_encode($response);
        exit();
    }

    // Check if a session already exists with that user_id and delete it, if it does
    $stmt = $db->prepare('SELECT session_id FROM session WHERE user_id = ?');
    $stmt->execute([$user['id']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() != 0 && session_id() != $row['session_id']) {
        $stmt = $db->prepare('DELETE FROM session WHERE user_id = ?');
        $stmt->execute([$user['id']]);
    }

    // Update session and session variables
    $stmt = $db->prepare('UPDATE session SET user_id = ? WHERE session_id = ?');
    $stmt->execute([$user['id'], session_id()]);

    $_SESSION['logged'] = 1;
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['firstname'] = $user['firstname'];
    $_SESSION['lastname'] = $user['lastname'];
    $_SESSION['user_status'] = $user['status'];
    $_SESSION['user_type'] = $user['type'];

    // Insert in description login log
    $stmt = $db->prepare('INSERT INTO login_log (username, ip_address, status) VALUES (?, ?, ?)');
    $stmt->execute([$username, $_SERVER['REMOTE_ADDR'], 'Success Login']);

    // Everything is OK
    echo json_encode($response);
    exit();

} else {
    $response['st'] = 0;
    $response['msg'] = 'Презаредете страницата и опитайте отново.';
    echo json_encode($response);
    exit();
}