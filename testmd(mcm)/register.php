<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <form action="<?php echo base_url('UserController/register_user'); ?>" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>
