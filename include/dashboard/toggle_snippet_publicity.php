<?php

require_once '../settings.php';

if (!is_logged()) {
    exit();
}

$response = array(
    'st' => 1,
    'msg' => ''
);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['checked'])) {

    $snippet_id = $_POST['id'];
    $checked = ($_POST['checked'] == 'true') ? true : false;

    $stmt = $db->prepare('UPDATE snippet SET is_public = ? WHERE id = ? AND creator_id = ?');

    $stmt->execute([$checked, $snippet_id, $_SESSION['user_id']]);

    echo json_encode($response);
    exit();

} else {
    $response['st'] = 0;
    $response['msg'] = 'Моля презаредете страницата и опитайте отново.';
    echo json_encode($response);
    exit();
}