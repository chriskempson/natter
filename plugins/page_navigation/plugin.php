<?php 

// TODO: If the previous or next page is disabled, keep going until a not disabled page is found

function page_navigation($glob, $current_page_date, $next = 'Next: ', $previous = 'Previous: ') 
{
    $pages = date_listing(glob(DOCUMENT_ROOT . $glob . '/index.php'));
    $links = array();

    for ($i = 0; $i < count($pages); $i++) {

        if ($pages[$i]['date'] == $current_page_date) {

            if (@$pages[$i+1] && @$pages[$i+1]['disabled'] != "true") {
                $links[] = '<span class="previous-page-link">' . 
                '<span class="previous-page-link-text">' . 
                $previous .
                '</span><a href="' . $pages[$i+1]['dir'] .'">' . 
                $pages[$i+1]['title'] . 
                '</span></a>';
            }

            if (@$pages[$i-1] && @$pages[$i-1]['disabled'] != "true") {
                $links[] = '<span class="next-page-link">' .
                '<span class="next-page-link-text">' .
                $next . 
                '</span><a href="' . $pages[$i-1]['dir'] .'">' . 
                $pages[$i-1]['title'] . 
                '</span></a>';
            }

        }
    }

    return implode("\n", $links);
}