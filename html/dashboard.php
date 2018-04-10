<h2>Добави парче код</h2>

<h2>Моите парчета код</h2>
<div class="panel-group" id="accordion">

    <?php
    $query = 'SELECT id, title, text, lang, created_on, updated_on
            FROM snippet
            WHERE creator_id = ? AND status = ?
            ORDER BY created_on DESC';
    $stmt = $db->prepare($query);
    $stmt->execute(array($_SESSION['user_id'], SNIPPET_STATUS_APPROVED));

    $snippets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php foreach ($snippets as $snip) : ?>
        <div class="panel panel-default">

            <div class="panel-body">
                <div class="panel-title">
                    <h4><strong><?= $snip['title']; ?></strong></h4>
                </div>

                <div class="row">

                    <div class="col-md-11">
                        <h4 style="display: inline"><span class="label label-info">Дата на създаване: <?= date('d.m.Y', strtotime($snip['created_on'])); ?></span></h4>
                        <h4 style="display: inline"><span class="label label-success">Последно редактиране: <?= date('d.m.Y', strtotime($snip['updated_on'])); ?></span></h4>
                    </div>

                    <div class="col-md-1">

                        <button class="btn btn-snip">
                            <span class="glyphicon glyphicon-option-horizontal"></span>
                        </button>

                        <button class="btn btn-snip">
                            <span class="glyphicon glyphicon-share-alt"></span>
                        </button>

                    </div>
                </div>

                <button class="btn btn-block btn-snip" type="button" data-toggle="collapse" href="#snip_<?= $snip['id']; ?>">
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </button>
            </div>

            <div id="snip_<?= $snip['id']; ?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <pre><code class="<?= $snip['lang']; ?> hljs"><?= $snip['text']; ?></code></pre>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>