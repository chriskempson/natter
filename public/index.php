<?php include $_SERVER['DOCUMENT_ROOT'] . '/../netcrafter.php' ?>

<title>Discussion</title>

<?php partial('header') ?>

<section id="topics">
    
    <h2>News</h2>
    <?php
    function count_directories($path) {
        return count(glob($path));
    }
    ?>
    <ul>
        <li><a href="news/releases/">Releases</a> <?= count_directories('news/releases/*/') ?></li>
        <li><a href="news/updates/">Updates</a> <?= count_directories('news/updates/*/') ?></li>
    </ul>

    <h2>General</h2>

    <ul>
        <li><a href="general/off-topic/">Off Topic</a> <?= count_directories('general/off-topic/*/') ?></li>
    </ul>
</div>

<?php partial('footer') ?>