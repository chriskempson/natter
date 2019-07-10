<?php include $_SERVER['DOCUMENT_ROOT'] . '/../netcrafter.php' ?>

<title>First Post</title>
<meta name="date" content="2019-07-08">
<meta name="author" content="1">

<?php partial('header') ?>

<h1><?= meta('title') ?></h1>

<?= breadcrumb() ?>

<?= discussion() ?>

<?php partial('footer') ?>
