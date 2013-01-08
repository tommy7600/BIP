<?php if (isset($error)): ?>
    <?php echo $error ?>
<?php endif ?>

<form action="" method="post">
    <label>Login:</label>
    <input type="text" name="username">
    <label>Pass:</label>
    <input type="password" name="password">
    <button type="submit">Login in</button>
</form>