<?php
/**
* Generates a URL friendly slug
*
* @param string $string Text to be converted
*
* @return string 
*/
function slug($string) 
{
    // Replace multiple slashes with a space
    $string = preg_replace('/\/+/', ' ', $string);

    // Replace ampersands with with and
    $string = preg_replace('/&+/', 'and', $string);

    // Strip unwanted characters
    $string = preg_replace('/[^ a-zA-Z0-9-]/', '', trim($string));

    // Replace multiple spaces with a dash
    $string = preg_replace('/ +/', '-', $string);

    // Replace multiple dashes
    $string = preg_replace('/-+/', '-', $string);

    // Make lowercase
    $string = strtolower($string);

    return $string;
}