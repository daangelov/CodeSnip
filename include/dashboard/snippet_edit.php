<?php

require_once '../settings.php';

if (!is_logged()) {
    exit();
}

$response = array(
    'st' => 1,
    'msg' => '',
    'snippet' => ''
);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $snippet_id = $_POST['id'];

    $stmt = $db->prepare('SELECT text FROM snippet WHERE id = ?');
    $stmt->execute([$snippet_id]);
    $snippet_text = $stmt->fetch(PDO::FETCH_ASSOC);
    $response['snippet'] = $snippet_text['text'];

    echo json_encode($response);
    exit();

} else {
    $response['st'] = 0;
    $response['msg'] = 'Моля презаредете страницата и опитайте отново.';
    echo json_encode($response);
    exit();
}
