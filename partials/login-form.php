<form action="<?= parse_url($_SERVER['REQUEST_URI'])['path'] ?>" method="post">
    <input type="email" name="email" value="<?= $email ?>" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Login">
</form>