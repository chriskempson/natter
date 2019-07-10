<?php
include 'Parsedown.php';

function markdown($text) {
    $parsedown = new Parsedown();
    echo $parsedown->text($text);
}