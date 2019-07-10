<?php

function breadcrumb() {

    $directories = explode('/', $_SERVER['REQUEST_URI']);
    
    $path = '';
    $breadcrumb = '<ul>';
    foreach ($directories as $directory) {
        if ($directory) {
            $path = $path . $directory.'/';
    
            $url = '/'. $path;
            $file = DOCUMENT_ROOT . $url . 'index.php';

            // If we are not at the last level and the index file exists
            if ($url != $_SERVER['REQUEST_URI']
            && is_file($file)) {
                $breadcrumb .= '<li><a href="' . $url .'">' . meta_from_file($file, 'title') . '</a></li>';
            }
        }
    }
    return $breadcrumb .= '</ul>';
}