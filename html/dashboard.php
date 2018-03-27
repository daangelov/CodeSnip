    <h2>Моите парчета код</h2>

    <div class="panel-group" id="accordion">
        <?php

        $stmt = $db->prepare('SELECT id, title, text, lang, created_on, updated_on FROM snippet WHERE creator_id = ? AND status = ?');
        $stmt->execute(array($_SESSION['user_id'], SNIPPET_STATUS_APPROVED));

        $snippets = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php foreach ($snippets as $snip) : ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <!-- Add to div data-parent="#accordion" -->
                    <div class="snippet-name" data-toggle="collapse" href="#<?= $snip['id']; ?>">
                        <h4><?= $snip['title']; ?></h4>
                        <span style="display: block">Дата на създаване: <?= date('d-m-Y', strtotime($snip['created_on'])); ?></span>
                        <span style="display: block">Последно редактиране: <?= date('d-m-Y', strtotime($snip['updated_on'])); ?></span>
                    </div>
                </h4>
            </div>
            <div id="<?= $snip['id']; ?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <pre><code class="<?= $snip['lang']; ?> hljs"><?= $snip['text']; ?></code></pre>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

    <script src="<?= BASE_URL; ?>js/custom/dashboard.js" type="text/javascript"></script>