<div>
    <div><?= $post['date'] ?></div>
    <div><?= user($post['author'])['name'] ?></div>
    <div><?= markdown(nl2br($post['message'])) ?></div>
    <?php if (isset($post['edited'])) : ?>
    <div>Last edited: <?= $post['edited'] ?></div>
    <?php endif ?>
    <a href="?delete=<?= $post['id'] ?>">Delete</a>
    <a href="?edit=<?= $post['id'] ?>">Edit</a>
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" class="post hide id<?= $post['id'] ?>">
        <div><textarea name="message"><?= $post['message'] ?></textarea></div>
        <div><input type="submit" value="Post Message"></div>
    </form>
    <hr>
</div>