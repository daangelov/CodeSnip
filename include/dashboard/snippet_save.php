<?php

require_once '../settings.php';

$response = array(
    'st' => 1,
    'msg' => ''
);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['content'])) {

    $snip_id = $_POST['id'];
    $content = htmlspecialchars($_POST['content']);

    $stmt = $db->prepare('UPDATE snippet SET text = ? WHERE id = ?');
    $stmt->execute([$content, $snip_id]);

    echo json_encode($response);
    exit();

} else {
    $response['st'] = 0;
    $response['msg'] = 'Моля презаредете страницата и опитайте отново.';
    echo json_encode($response);
    exit();
}
