<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>User Registration</h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <?php if (isset($validation)) : ?>
        <div style="color: red;">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="/register" method="post">
        <?= csrf_field() ?>
        <label>First Name:</label>
        <input type="text" name="user_firstname" /><br><br>

        <label>Middle Name:</label>
        <input type="text" name="user_middlename" /><br><br>

        <label>Last Name:</label>
        <input type="text" name="user_lastname" /><br><br>

        <label>Suffix:</label>
        <input type="text" name="user_suffix" /><br><br>

        <label>Email:</label>
        <input type="email" name="user_email" /><br><br>

        <label>Password:</label>
        <input type="password" name="user_password" /><br><br>

        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" /><br><br>

        <label>User Type:</label>
        <select name="user_type">
            <option value="Faculty">Faculty</option>
            <option value="Staff">Staff</option>
        </select><br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
