<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>User login</h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <?php if (isset($validation)) : ?>
        <div style="color: red;">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="/login" method="post">
        <?= csrf_field() ?>
        <label>Email:</label>
        <input type="email" name="user_email" /><br><br>

        <label>Password:</label>
        <input type="password" name="user_password" /><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
