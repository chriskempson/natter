<?php
// Requires the file_listing plugin

/**
* Sorts the result of the file_listing plugin by descending date order
*
* @param array $paths An array of file paths e.g. from glob()
*
* @return array A array with elements path, dir and settings
*/
function date_listing($paths) 
{
    $files = (meta_from_files($paths));
            
    // Sort descending by date
    usort($files, function($a, $b) {
        $a = strtotime($a['date']);
        $b = strtotime($b['date']);
        return $b - $a;
    });
    
    return $files;
}