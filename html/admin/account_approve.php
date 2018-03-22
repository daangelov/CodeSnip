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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Status</th>
                    <th class="text-center">Option</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($res as $user) : ?>

                    <tr>
                        <td><?= $user['firstname']; ?></td>
                        <td><?= $user['lastname']; ?></td>
                        <td><?= $user['username']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td>Pending</td>

                        <td class="text-center text-primary">
                            <!-- Approve -->
                            <a title="Approve" id="<?= $user['id']; ?>" class="acc_approve btn btn-default btn-success">
                                <span class="glyphicon glyphicon-ok"></span>
                            </a>
                            <!-- Ban -->
                            <a title="Ban" id="<?= $user['id']; ?>" class="acc_ban btn btn-default btn-danger">
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

    <h3 class="text-center">No New Accounts</h3>
<?php endif; ?>

    <script src="<?= BASE_URL; ?>js/custom/account_approve.js"></script>
