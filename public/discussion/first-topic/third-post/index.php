<?php include $_SERVER['DOCUMENT_ROOT'] . '/../netcrafter.php' ?>

<title>Third Post</title>
<meta name="date" content="2019-07-09 19:07">
<meta name="author" content="">

<?php partial('header') ?>

<h1><?= meta('title') ?></h1>

<?= breadcrumb() ?>

<?= discussion() ?>

<?php partial('footer') ?>