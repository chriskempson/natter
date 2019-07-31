<?php include $_SERVER['DOCUMENT_ROOT'] . '/../netcrafter.php' ?>

<title>About</title>

<?php partial('header') ?>

<?= markdown(file_get_contents('https://raw.githubusercontent.com/chriskempson/natter/master/README.md')) ?>
<?php partial('footer') ?>