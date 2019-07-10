<?php include $_SERVER['DOCUMENT_ROOT'] . '/../netcrafter.php' ?>

<title>Second Post</title>
<meta name="date" content="2019-07-08">
<meta name="author" content="2">

<?php partial('header') ?>

<h1><?= meta('title') ?></h1>

<?= breadcrumb() ?>

<?= discussion() ?>

<?php partial('footer') ?>