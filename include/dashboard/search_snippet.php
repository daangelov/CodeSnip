<?php

require_once '../settings.php';

if (!is_logged()) {
    exit();
}

$response = array(
    'st' => 1,
    'snippets' => [],
    'msg' => ''
);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['input'])) {

    $input = mb_strtolower($_POST['input']);

    $query = "SELECT id FROM snippet
        WHERE creator_id = :user_id AND (lower(title) LIKE :input OR lower(lang) LIKE :input OR DATE_FORMAT(created_on, '%d.%m.%Y %H:%i') LIKE :input OR DATE_FORMAT(updated_on, '%d.%m.%Y %H:%i') LIKE :input)";

    $stmt = $db->prepare($query);
    $stmt->execute(['user_id' => $_SESSION['user_id'], 'input' => "%$input%"]);

    $snippets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($snippets as $snippet) {
        $response['snippets'][] = $snippet['id'];
    }

    echo json_encode($response);
    exit();

} else {
    $response['st'] = 0;
    $response['msg'] = 'Моля презаредете страницата и опитайте отново.';
    echo json_encode($response);
    exit();
}
