<div class="row margin-bottom">
    <div class="col-xs-12 col-sm-6">
        <h2>Моите парчета код</h2>
    </div>
    <div class="col-xs-12 col-sm-6">
        <form id="search-snippet" method="post" action="<?= BASE_URL; ?>include/dashboard/search_snippet.php">
            <div class="input-group margin-top">
                <input type="text" class="form-control" name="input" placeholder="Заглавие, език, дата...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Търси</button>
                </span>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div class="panel panel-default">

            <div class="panel-heading panel-white">
                <button class="btn btn-default" data-toggle="collapse" href="#snip-upload">Добави парче код</button>
            </div>

            <div class="panel-body collapse" id="snip-upload">
                <form id="snip-upload-form" action="<?= BASE_URL; ?>include/dashboard/add_snippet.php" method="post">

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <label for="title-of-snippet"></label>
                            <div class="input-group">
                                <span class="input-group-addon" id="label-of-input1">Заглавие</span>
                                <input type="text" class="form-control" id="title-of-snippet" aria-describedby="label-of-input1" name="title">
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <label for="lang-of-snippet"></label>
                            <div class="input-group">
                                <span class="input-group-addon" id="label-of-input2">Език</span>
                                <input type="text" class="form-control" id="lang-of-snippet" aria-describedby="label-of-input2" name="lang">
                            </div>
                        </div>
                    </div>

                    <label for="code-of-snippet"></label>
                    <div class="input-group">
                        <span class="input-group-addon">Код</span>
                        <textarea class="form-control snip-textarea" id="code-of-snippet" placeholder="Поставете Вашето парче код тук" name="code"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success snip-upload">Запази</button>

                </form>
            </div>
        </div>
    </div>
</div>
<div id="snippet-message" class='alert alert-warning text-center'><strong>Няма намерени резултати</strong></div>
<div class="panel-group" id="accordion">

    <?php
    $query = 'SELECT id, title, text, lang, created_on, updated_on, is_public
            FROM snippet
            WHERE creator_id = ? AND status = ?
            ORDER BY created_on DESC';
    $stmt = $db->prepare($query);
    $stmt->execute([$_SESSION['user_id'], SNIPPET_STATUS_APPROVED]);

    $snippets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php foreach ($snippets as $snippet) : ?>
        <div id="<?= $snippet['id']; ?>" class="panel panel-default snippet">

            <div class="panel-body">
                <div class="panel-title">
                    <h4><strong><?= $snippet['title']; ?></strong></h4>
                </div>

                <div class="row">

                    <div class="col-sm-10 col-lg-11">
                        <div class="row">
                            <h4 class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><span class="label label-info">Създадено: <?= date('d.m.Y H:i', strtotime($snippet['created_on'])); ?></span></h4>
                            <h4 class="col-xs-12 col-sm-6 col-md-4 col-lg-3"><span class="label label-success">Редактирано: <?= date('d.m.Y H:i', strtotime($snippet['updated_on'])); ?></span></h4>
                        </div>
                    </div>

                    <div class="col-sm-2 col-lg-1 snip-functions">

                        <button type="button" class="btn btn-snip snip-settings" data-toggle="popover">
                            <span class="glyphicon glyphicon-option-horizontal"></span>
                        </button>

                        <button type="button" class="btn btn-snip snip-share" data-toggle="popover">
                            <span class="glyphicon glyphicon-share-alt"></span>
                        </button>

                    </div>
                </div>

                <button class="btn btn-block btn-snip" type="button" data-toggle="collapse" href="#snip_<?= $snippet['id']; ?>">
                    <span class="glyphicon glyphicon glyphicon-menu-down"></span>
                </button>
            </div>

            <div id="snip_<?= $snippet['id']; ?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <pre><code class="<?= $snippet['lang']; ?> hljs"><?= $snippet['text']; ?></code></pre>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>