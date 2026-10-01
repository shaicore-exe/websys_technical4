<!DOCTYPE html>
<html>
<head>
    <title>New User</title>
</head>
<body>

    <h1>Add New User</h1>

    <?php if (session('errors')): ?>
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('users/create') ?>" method="post">
        <?= csrf_field() ?>

        <p>
            <label>Username</label><br>
            <input
                type="text"
                name="username"
                value="<?= old('username') ?>"
            >
        </p>

        <p>
            <label>Full Name</label><br>
            <input
                type="text"
                name="full_name"
                value="<?= old('full_name') ?>"
            >
        </p>

        <button type="submit">Save User</button>
    </form>

    <p>
        <a href="<?= site_url('users') ?>">Back to Users</a>
    </p>

</body>
</html>