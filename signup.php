<?php
require_once 'include/settings.php';

if (is_logged()) {
    redirect('index.php');
}

include_once ROOT . 'html/common/header.php';

include_once ROOT . 'html/signup.php';

include_once ROOT . 'html/common/footer.php';