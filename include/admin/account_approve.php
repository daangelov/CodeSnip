<?php

require_once '../settings.php';

if (!is_logged() || !is_admin()) {
    exit();
}

$response = array(
    'st' => 1,
    'msg' => ''
);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['action'])) {

    $user_id = $_POST['id'];
    $action = $_POST['action'];

    $user_status = USER_STATUS_PENDING;

    if ($action == 'approve') {
        $user_status = USER_STATUS_APPROVED;
    } elseif ($action == 'ban') {
        $user_status = USER_STATUS_BANNED;
    } else {
        $response['st'] = 0;
        $response['msg'] = 'Презаредете страницата и опитайте отново.';
        echo json_encode($response);
        exit();
    }

    // Select the user with this username from database
    $stmt = $db->prepare('UPDATE user SET status = ? WHERE id = ?');
    $stmt->execute([$user_status, $user_id]);

    $response['msg'] = 'Успешна операция';
    echo json_encode($response);
    exit();

} else {
    $response['st'] = 0;
    $response['msg'] = 'Презаредете страницата и опитайте отново.';
    echo json_encode($response);
    exit();
}