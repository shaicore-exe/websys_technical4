<!DOCTYPE html>
<html>
<head>
    <title>Customer Accounts</title>
</head>
<body>

    <h1>Customer Accounts</h1>

    <?php if (session('message')): ?>
        <p><?= session('message') ?></p>
    <?php endif; ?>

    <p>
        <a href="<?= site_url('customers/new') ?>">Add New Customer</a>
    </p>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php foreach ($customerList as $customerRecord): ?>
            <tr>
                <td><?= esc($customerRecord['id']) ?></td>
                <td><?= esc($customerRecord['full_name']) ?></td>
                <td><?= esc($customerRecord['email']) ?></td>
                <td>
                    <a href="<?= site_url('customers/edit/' . $customerRecord['id']) ?>">
                        Edit
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
