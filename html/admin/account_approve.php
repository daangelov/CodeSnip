<?php

$stmt = $db->prepare('SELECT * FROM code_snip.user WHERE status = ?');
$stmt->execute(array(USER_STATUS_PENDING));

$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($stmt->rowCount() > 0) : ?>

    <div class="container">
        <div class="table-responsive">
            <table id="acc_approve_tb" class="table">
                <thead>
                <tr>
                    <th>Име</th>
                    <th>Фамилия</th>
                    <th>Потребителско име</th>
                    <th>E-mail адрес</th>
                    <th>Статус</th>
                    <th class="text-center">Опции</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($res as $user) : ?>

                    <tr>
                        <td><?= $user['firstname']; ?></td>
                        <td><?= $user['lastname']; ?></td>
                        <td><?= $user['username']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td>Изчаква одобрение</td>

                        <td class="text-center text-primary">
                            <!-- Approve -->
                            <a title="Одобри" id="<?= $user['id']; ?>" data-action="approve" class="acc_approve btn btn-default btn-success">
                                <span class="glyphicon glyphicon-ok"></span>
                            </a>
                            <!-- Ban -->
                            <a title="Забрани" id="<?= $user['id']; ?>" data-action="ban" class="acc_ban btn btn-default btn-danger">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
<?php else : ?>

    <h3 class="text-center">Няма нови потребителски акаунти</h3>
<?php endif; ?>

    <script src="<?= BASE_URL; ?>js/custom/account_approve.js"></script>
