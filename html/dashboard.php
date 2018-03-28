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
            <!-- Add to div data-parent="#accordion" -->
            <div class="panel-heading" data-toggle="collapse" href="#<?= $snip['id']; ?>">
                <h4 class="panel-title">
                    <div>
                        <h4><?= $snip['title']; ?></h4>
                        <span>Дата на създаване: <?= date('d-m-Y', strtotime($snip['created_on'])); ?></span>
                        <span>Последно редактиране: <?= date('d-m-Y', strtotime($snip['updated_on'])); ?></span>
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