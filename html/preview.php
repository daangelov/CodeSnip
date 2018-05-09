<?php

$query = 'SELECT s.title, s.text, s.lang, s.created_on, s.updated_on, u.username, u.firstname, u.lastname  
    FROM snippet AS s INNER JOIN user AS u ON s.creator_id = u.id
    WHERE s.id = ? AND s.is_public = ? AND s.status = ?';

$stmt = $db->prepare($query);
$stmt->execute([$_GET['id'], true, SNIPPET_STATUS_APPROVED]);

$snippet = $stmt->fetch(PDO::FETCH_ASSOC);

if ($stmt->rowCount() != 1) : ?>
    <?php redirect('index.php'); ?>
<?php else : ?>
    <ul class="list-group">
        <li class="list-group-item">
            <h1><?= $snippet['title']; ?>
                <small>Автор: <?= $snippet['username'] . '(' . $snippet['firstname'] . ' ' . $snippet['lastname'] . ')'; ?></small>
            </h1>
        </li>
        <li class="list-group-item">
            <h4 class="date"><span class="label label-info">Дата на създаване: <?= date('d.m.Y', strtotime($snippet['created_on'])); ?></span></h4>
            <h4 class="date"><span class="label label-success">Последно редактиране: <?= date('d.m.Y', strtotime($snippet['updated_on'])); ?></span></h4>
        </li>
        <li class="list-group-item">
        <pre>
            <code class="<?= $snippet['lang']; ?> hljs"><?= $snippet['text']; ?></code>
        </pre>
        </li>
    </ul>
<?php endif; ?>