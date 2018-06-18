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
        try {
            $db->beginTransaction();
            $stmt = $db->prepare('INSERT INTO snippet (creator_id, title, lang, text) VALUES (?, ?, ?, ?);');
            $stmt->execute([$_SESSION['user_id'], $title, $lang, $code]);
            $stmt = $db->query('SELECT LAST_INSERT_ID();');

            $snippet = $stmt->fetch(PDO::FETCH_ASSOC);

            $public_id = @crypt($snippet['LAST_INSERT_ID()']);

            $stmt = $db->prepare('UPDATE snippet SET public_id = ? WHERE id = ?');
            $stmt->execute([$public_id, $snippet['LAST_INSERT_ID()']]);

            $db->commit();

        } catch (PDOException $exception) {
            $response['st'] = 2;
            $response['msg'] = "Нещо се обърка. Моля презаредете страницата";
            $db->rollBack();
        }
    }

    echo json_encode($response);
    exit();

} else {
    $response['st'] = 0;
    $response['msg'] = 'Моля презаредете страницата и опитайте отново.';
    echo json_encode($response);
    exit();
}
