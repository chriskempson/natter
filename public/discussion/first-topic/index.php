<?php include $_SERVER['DOCUMENT_ROOT'] . '/../netcrafter.php' ?>

<title>First Topic</title>

<?php partial('header') ?>

<h1><?= meta('title') ?></h1>

<?= breadcrumb() ?>

<?php
function new_thread_form() {

    // Set $query to hold query string vars
    if (isset($_SERVER['QUERY_STRING'])) {
        parse_str($_SERVER['QUERY_STRING'], $query);
    }

    // Handle post deletion
    if (isset($query['new-thread'])) { ?>
        <form action="<?= parse_url($_SERVER['REQUEST_URI'])['path'] ?>?new" method="post">
            <div><input type="text" name="title"></div>
            <div><input type="submit" value="Post Message"></div>
        </form>
    <?php 
    }

    if (isset($_POST['title'])) {

        // Prepare the message
        $title = strip_tags($_POST['title']);

        new_thread('/discussion/first-topic/' . slug($title), [
            'title' => $title,
            'date' => gmdate('Y-m-d H:m'),
            'author' => session('user')['id'],
        ]);
    }
    
    echo '<a href="/discussion/first-topic/?new-thread">New Thread</a>';
}
?>

<?= new_thread_form() ?>

<nav>
    <section id="post-listing">
        <?= page_listing('discussion/*/*') ?>
    </section>
</nav>

<?php partial('footer') ?>