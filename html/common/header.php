<!DOCTYPE html>
<html>

<head>
    <title>CodeSnip</title>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'>

    <link href="<?= BASE_URL; ?>css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL; ?>css/main.css" type="text/css" rel="stylesheet">

    <script src="<?= BASE_URL; ?>js/jquery/jquery-3.3.1.min.js"></script>
</head>

<body>
<!-- Loading div and gif -->
<div id="loading_div"></div>
<div id="loading_gif"></div>

<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">

            <div class="navbar-header">
                <a class="navbar-brand" href="<?= BASE_URL; ?>index.php">CodeSnip</a>

                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbarMain">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarMain">
            <?php if (is_logged()) : ?>

                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?= BASE_URL; ?>index.php">Начало</a>
                    </li>
                <?php if (is_admin()) : ?>

                    <li>
                        <a href="<?= BASE_URL; ?>account_approve.php">Потребителски Акаунти</a>
                    </li>
                <?php endif; ?>

                </ul>

                <div class="navbar-header">
                    <span class="navbar-text">Здравей, <?= $_SESSION["firstname"] . " " . $_SESSION["lastname"]; ?></span>
                </div>

                <form class="navbar-form navbar-right" action="<?= BASE_URL; ?>include/entry/logout.php" method="POST">
                    <button class="btn btn-default" type="submit" name="submit">Изход</button>
                </form>
            <?php else : ?>

                <form id="login" class="navbar-form navbar-right" action="<?= BASE_URL; ?>include/entry/login.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="usr" placeholder="Потребителско име">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pwd" placeholder="Парола">
                    </div>
                    <button name="submit" type="submit" class="btn btn-default">Вход</button>
                    <a class="btn-signup btn btn-default" href="<?= BASE_URL; ?>signup.php">Регистрация</a>
                </form>
            <?php endif; ?>

            </div>
        </div>
    </nav>

