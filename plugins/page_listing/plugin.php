<?php

function page_listing($glob) 
{
    $pages = date_listing(glob(DOCUMENT_ROOT . $glob . '/index.php'));
    $links = array();

    foreach ($pages as $page) {

        // Return if a page has been disabled
        if (isset($page['disabled']) &&
            $page['disabled'] == "true") continue;

        $links[] = '<li>
            <h2><a href="' . $page['directory'] .'">' . $page['title'] .'</a></h2>
            <div class="author">' . user($page['author'])['name'] . '</div>
            <div class="date">' . $page['date'] . '</div>
            <a href="?delete=' . $page['id'] . '">Delete</a>
            <a href="?edit=' . $page['id'] .'">Edit</a>
        </li>';
    }

    return '<ul>' . implode("\n", $links) . '</ul>';
}