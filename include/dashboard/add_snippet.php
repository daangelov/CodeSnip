<?php

require_once '../settings.php';

if (!is_logged()) {
    exit();
}

$response = array(
    'st' => 1,
    'msg' => ''
);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title']) && isset($_POST['lang']) && isset($_POST['code'])) {

    $title = htmlspecialchars($_POST['title']);
    $lang = htmlspecialchars($_POST['lang']);
    $code = htmlspecialchars($_POST['code']);


    if (strlen($lang) < 1 || strlen($lang) > 32) {
        $response['st'] = 2;
        $response['msg'] = "Невалиден език за програмиране.";
    }

    if (strlen($title) < 1 || strlen($title) > 128) {
        $response['st'] = 2;
        $response['msg'] = "Невалидно заглавие за парче код.";
    }

    if ($response['st'] == 1) {
        $stmt = $db->prepare('INSERT INTO snippet (creator_id, title, lang, text) VALUES (?, ?, ?, ?)');
        $stmt->execute([$_SESSION['user_id'], $title, $lang, $code]);
    }

    echo json_encode($response);
    exit();

} else {
    $response['st'] = 0;
    $response['msg'] = 'Моля презаредете страницата и опитайте отново.';
    echo json_encode($response);
    exit();
}
