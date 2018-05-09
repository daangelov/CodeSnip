<?php

require_once '../settings.php';

$response = array(
    'st' => 1,
    'msg' => '',
    'snippet' => ''
);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $snip_id = $_POST['id'];

    $stmt = $db->prepare('SELECT text FROM snippet WHERE id = ?');
    $stmt->execute([$snip_id]);
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
