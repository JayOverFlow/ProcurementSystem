<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    <?php if (session()->has('error')): ?>
        <div class="alert alert-danger">
            <?= session('error') ?>
        </div>
    <?php endif; ?>

    <?= form_open('testing') ?>

        <div class="form-group">
            <label for="user_firstname">First Name</label>
            <?= form_input('user_firstname', set_value('user_firstname', $data['user_firstname']), ['class' => 'form-control', 'id' => 'user_firstname']) ?>
            <?php if (isset($validation) && $validation->hasError('user_firstname')): ?>
                <div class="text-danger">
                    <?= $validation->getError('user_firstname') ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="user_middlename">Middle Name</label>
            <?= form_input('user_middlename', set_value('user_middlename', $data['user_middlename']), ['class' => 'form-control', 'id' => 'user_middlename']) ?>
            <?php if (isset($validation) && $validation->hasError('user_middlename')): ?>
                <div class="text-danger">
                    <?= $validation->getError('user_middlename') ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="user_lastname">Last Name</label>
            <?= form_input('user_lastname', set_value('user_lastname', $data['user_lastname']), ['class' => 'form-control', 'id' => 'user_lastname']) ?>
            <?php if (isset($validation) && $validation->hasError('user_lastname')): ?>
                <div class="text-danger">
                    <?= $validation->getError('user_lastname') ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="user_suffix">Suffix</label>
            <?= form_input('user_suffix', set_value('user_suffix', $data['user_suffix']), ['class' => 'form-control', 'id' => 'user_suffix']) ?>
            <?php if (isset($validation) && $validation->hasError('user_suffix')): ?>
                <div class="text-danger">
                    <?= $validation->getError('user_suffix') ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="user_email">Email Address</label>
            <?= form_input('user_email', set_value('user_email', $data['user_email']), ['class' => 'form-control', 'id' => 'user_email', 'type' => 'email']) ?>
            <?php if (isset($validation) && $validation->hasError('user_email')): ?>
                <div class="text-danger">
                    <?= $validation->getError('user_email') ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="user_password">Password</label>
            <?= form_password('user_password', set_value('user_password', $data['user_password']), ['class' => 'form-control', 'id' => 'user_password']) ?>
            <?php if (isset($validation) && $validation->hasError('user_password')): ?>
                <div class="text-danger">
                    <?= $validation->getError('user_password') ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <?= form_password('confirm_password', set_value('confirm_password', $data['confirm_password']), ['class' => 'form-control', 'id' => 'confirm_password']) ?>
            <?php if (isset($validation) && $validation->hasError('confirm_password')): ?>
                <div class="text-danger">
                    <?= $validation->getError('confirm_password') ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>User Type</label>
            <div class="form-check">
                <?= form_radio('user_type', 'Faculty', set_radio('user_type', 'Faculty', $data['user_type'] == 'Faculty'), ['class' => 'form-check-input', 'id' => 'user_type_faculty']) ?>
                <label class="form-check-label" for="user_type_faculty">Faculty</label>
            </div>
            <div class="form-check">
                <?= form_radio('user_type', 'Staff', set_radio('user_type', 'Staff', $data['user_type'] == 'Staff'), ['class' => 'form-check-input', 'id' => 'user_type_staff']) ?>
                <label class="form-check-label" for="user_type_staff">Staff</label>
            </div>
            <?php if (isset($validation) && $validation->hasError('user_type')): ?>
                <div class="text-danger">
                    <?= $validation->getError('user_type') ?>
                </div>
            <?php endif; ?>
        </div>

        <?= form_submit('submit', 'Register', ['class' => 'btn btn-primary']) ?>

    <?= form_close() ?>
</body>
</html>