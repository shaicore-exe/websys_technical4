<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

    <h1>Edit User</h1>

    <?php if (session('errors')): ?>
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form
        action="<?= site_url('users/update/' . $selectedUser['id']) ?>"
        method="post"
        enctype="multipart/form-data"
    >
        <?= csrf_field() ?>

        <p>
            <label>Username</label><br>
            <input
                type="text"
                name="username"
                value="<?= old('username', $selectedUser['username']) ?>"
            >
        </p>

        <p>
            <label>Full Name</label><br>
            <input
                type="text"
                name="full_name"
                value="<?= old('full_name', $selectedUser['full_name']) ?>"
            >
        </p>

        <p>
            <label>Profile Picture</label><br>
            <input
                type="file"
                name="avatar"
                accept=".jpg,.jpeg,.png"
            >
        </p>

        <button type="submit">Update User</button>
    </form>

    <p>
        <a href="<?= site_url('users') ?>">Back to Users</a>
    </p>

</body>
</html>
