<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
</head>
<body>

    <h1>Edit Customer</h1>

    <?php if (session('errors')): ?>
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form
        action="<?= site_url('customers/update/' . $selectedCustomer['id']) ?>"
        method="post"
    >
        <?= csrf_field() ?>

        <p>
            <label>Full Name</label><br>
            <input
                type="text"
                name="full_name"
                value="<?= old('full_name', $selectedCustomer['full_name']) ?>"
            >
        </p>

        <p>
            <label>Email</label><br>
            <input
                type="text"
                name="email"
                value="<?= old('email', $selectedCustomer['email']) ?>"
            >
        </p>

        <button type="submit">Update Customer</button>
    </form>

    <p>
        <a href="<?= site_url('customers') ?>">Back to Customers</a>
    </p>

</body>
</html>
