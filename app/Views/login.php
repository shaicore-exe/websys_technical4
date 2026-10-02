<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

    <h1>POS Login</h1>

    <?php if (session('error')): ?>
        <p class="error-message"><?= esc(session('error')) ?></p>
    <?php endif; ?>

    <?php if (session('message')): ?>
        <p><?= esc(session('message'))?></p>
    <?php endif; ?>

    <form action="<?= site_url('login')?>" method="post">

        <p>
            <label>Username</label><br>
            <input type="text" name="username" value="<?= old('username') ?>" required>
        </p>
        
        <p>
            <label>Password</label><br>
            <input type="password" name="password" required>
        </p>

        <button type="submit">Login</button>

    </form>
</body>
</html>