<form action="<?= parse_url($_SERVER['REQUEST_URI'])['path'] ?>" method="post">
    <input type="email" name="email" value="<?= $email ?>">
    <input type="password" name="password">
    <input type="submit" value="Login">
</form>