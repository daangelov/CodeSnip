<?php

require_once '../settings.php';

if (!is_logged()) {
    exit();
}

$response = array(
    'st' => 1,
    'msg' => '',
    'date' => date('d.m.Y'),
    'content' => ''
);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['content'])) {

    $snippet_id = $_POST['id'];
    $content = htmlspecialchars($_POST['content']);

    $stmt = $db->prepare('UPDATE snippet SET text = ?, updated_on = CURRENT_TIMESTAMP WHERE id = ?');
    $stmt->execute([$content, $snippet_id]);

    $response['content'] = $content;
    echo json_encode($response);
    exit();

} else {
    $response['st'] = 0;
    $response['msg'] = 'Моля презаредете страницата и опитайте отново.';
    echo json_encode($response);
    exit();
}
