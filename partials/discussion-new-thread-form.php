<form action="<?= parse_url($_SERVER['REQUEST_URI'])['path'] ?>?new" method="post">
    <div><input type="text" name="title"></div>
    <div><input type="submit" value="Create New Thread"></div>
</form>