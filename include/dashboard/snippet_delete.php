<?php

require_once '../settings.php';

$response = array(
    'st' => 1,
    'msg' => ''
);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $snip_id = $_POST['id'];

    $stmt = $db->prepare('DELETE FROM snippet WHERE id = ?');
    $stmt->execute([$snip_id]);

    echo json_encode($response);
    exit();

} else {
    $response['st'] = 0;
    $response['msg'] = 'Моля презаредете страницата и опитайте отново.';
    echo json_encode($response);
    exit();
}
