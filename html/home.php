    <?php if (!is_logged()) : ?>

    <div class="jumbotron">
        <h1>Започни сега</h1>
        <p class="lead">Започни да използваш CodeSnip като първо си създадеш профил в нашия сайт!</p>
        <a class="btn btn-lg btn-warning" href="<?= BASE_URL; ?>signup.php" role="button">Регистрирай се!</a>
    </div>
    <?php endif; ?>

    <div class="row featurette">
        <div class="col-md-5">
            <h2 class="featurette-heading">CodeSnip<br><span class="text-muted">Code it. Save it. Use it. Share it.</span></h2>
            <p class="lead">Никога не забравяй кода си вкъщи! Навсякъде и по всяко време. Лесеният начин за запазване, споделяне и използване на парчета код под формата на snippet.</p>
        </div>
        <div class="col-md-7">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="img" src="<?= BASE_URL; ?>img/logo.png">
        </div>
    </div>