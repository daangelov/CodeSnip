<?php

require_once 'include/settings.php';

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {

    if (!is_int((int)$_GET['id'])) {
        redirect('index.php');
    }

    require_once ROOT . 'html/common/header.php';

    require_once ROOT . 'html/preview.php';

    require_once ROOT . 'html/common/footer.php';

} else {
    redirect('index.php');
}