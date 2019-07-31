<?php include $_SERVER['DOCUMENT_ROOT'] . '/../netcrafter.php' ?>

<title>Version 0.1</title>
<meta name="date" content="2019-07-12 10:07">
<meta name="author" content="1">

<?php partial('header') ?>

<h1><?= meta('title') ?></h1>

<?= breadcrumb() ?>

<?= discussion() ?>

<?php partial('footer') ?>