<?php include $_SERVER['DOCUMENT_ROOT'] . '/../netcrafter.php' ?>

<title>Releases</title>

<?php partial('header') ?>

<h1><?= meta('title') ?></h1>

<?= breadcrumb() ?>

<?= add_thread() ?>

<nav>
    <section id="post-listing">
        <?= page_listing(SCRIPT_DIRECTORY . '/*') ?>
    </section>
</nav>

<?php partial('footer') ?>