<?php

function create_json_file($file) 
{
    if (!file_exists($file)) {
        file_put_contents($file, '');
    }
}

function read_json_file($file) 
{
    if (file_exists($file)) {
        return json_decode(file_get_contents($file), true);
    }
    else {
        die('Unable to read file ' . $file . '</div>');
        return [];
    }
}

function write_json_file($file, $array) 
{
    if (is_array($array)) {
        if (!file_put_contents($file, json_encode($array, JSON_PRETTY_PRINT))) {
            die('<div class="error">Unable to read file ' . $file . '</div>');
        }
    }
}