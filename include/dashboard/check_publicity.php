<?php

require_once '../settings.php';

if (!is_logged()) {
    exit();
}

$response = array(
    'st' => 1,
    'msg' => '',
    'content' => ''
);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

    $snippet_id = $_POST['id'];

    $stmt = $db->prepare('SELECT is_public, public_id FROM snippet WHERE id = ? AND creator_id = ?');
    $stmt->execute([$snippet_id, $_SESSION['user_id']]);

    $snippet = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($snippet) {

        $checkbox_checked = '';
        $display = 'style="display:none"';

        if ($snippet['is_public']) {
            $checkbox_checked = 'checked';
            $display = '';
        }
        $response['content'] = '
            <div class="popover-snip-share">
                <div class="input-group toggle-share">
                    <h4>Споделяне:</h4>
                    <span class="input-group-btn">
                        <input class="snip-state" data-toggle="toggle" type="checkbox" ' . $checkbox_checked . '>
                    </span>
                </div>
                <div ' . $display . ' class="input-group copy-share">
                    <input type="text" class="form-control input-monospace input-sm input-cp-snip" value="' . BASE_URL . 'preview.php?id=' . urlencode($snippet['public_id']) . '" readonly="">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-sm btn-default btn-cp-snip">
                            <span class="glyphicon glyphicon-copy"></span>
                        </button>
                    </span>
                </div>
            </div>';
    }

    echo json_encode($response);
    exit();

} else {
    $response['st'] = 0;
    $response['msg'] = 'Моля презаредете страницата и опитайте отново.';
    echo json_encode($response);
    exit();
}