<?php

require_once 'include/settings.php';

if (!is_logged()) {
    redirect('index.php');
}
if (!is_admin()) {
    redirect('index.php');
}

include_once ROOT . 'html/common/header.php';

include_once ROOT . 'html/admin/account_approve.php';

include_once ROOT . 'html/common/footer.php';