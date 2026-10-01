<!DOCTYPE html>
<html>
<head>
    <title>User Accounts</title>
</head>
<body>

    <h1>User Accounts</h1>

    <?php if (session('message')): ?>
        <p><?= session('message') ?></p>
    <?php endif; ?>

    <p>
        <a href="<?= site_url('customers') ?>">Customers</a> |
        <a href="<?= site_url('users/new') ?>">Add New User</a>
    </p>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Avatar</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Action</th>
        </tr>

        <?php foreach ($userList as $account): ?>
            <tr>
                <td><?= esc($account['id']) ?></td>

                <td>
                    <?php if ($account['avatar']): ?>
                        <img
                            src="<?= base_url('uploads/avatars/' . $account['avatar']) ?>"
                            width="80"
                            height="80"
                        >
                    <?php else: ?>
                        <img
                            src="<?= base_url('images/placeholder.svg') ?>"
                            width="80"
                            height="80"
                        >
                    <?php endif; ?>
                </td>

                <td><?= esc($account['username']) ?></td>
                <td><?= esc($account['full_name']) ?></td>

                <td>
                    <a href="<?= site_url('users/edit/' . $account['id']) ?>">
                        Edit
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
