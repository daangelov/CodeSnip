<?php

require_once 'include/system.php';

if (!is_logged()) {
    redirect('index.php');
}

include_once ROOT . 'html/common/header.php';

include_once ROOT . 'html/dashboard.php';

include_once ROOT . 'html/common/footer.php';