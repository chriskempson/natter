<form action="<?= parse_url($_SERVER['REQUEST_URI'])['path'] ?>?new" method="post">
    <div><textarea name="message" placeholder="My message..."></textarea></div>
    <div><input type="submit" value="Add My Message"></div>
</form>