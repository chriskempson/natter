<nav class="main">
    <ul>
        <li><?= active_link('/', 'Discussion', '/discussion/') ?></li>
        <li><?= active_link('/about/', 'About', '/about/') ?></li>
        <?php if (session('user')) : ?>
        <li><?= active_link('/logout/', 'Logout ' . session('user')['name']) ?></li>
        <?php else : ?>
        <li><?= active_link('/login/', 'Login') ?></li>
        <?php endif ?>
    </ul>
</nav>