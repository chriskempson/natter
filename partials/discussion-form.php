<form action="<?= parse_url($_SERVER['REQUEST_URI'])['path'] ?>?new" method="post">
    <div><textarea name="message"></textarea></div>
    <div><input type="submit" value="Post Message"></div>
</form>